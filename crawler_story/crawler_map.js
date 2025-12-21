const puppeteer = require("puppeteer-extra");
const database = require("./database");
const folder_path = "/storage/photos/nails";
const WAIT_TIME_SHORT = 1000;
const WAIT_TIME_SHORTLONG = 3000;
const WAIT_TIME_LONG = 3000;
const slugify = require("slugify");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");
puppeteer.use(StealthPlugin());

const crawlerData = {
    menu: true,
    images: true,
    about: true,
    comment: true,
};

const table = {
    product: "st_product",
    about: "st_about",
    image: "st_post_images",
    comment: "st_comment",
    crawler: "crawler_map",
};

function extractInParentheses(text) {
    const match = text.match(/\(([^)]+)\)/); // Tìm chuỗi bên trong dấu ()
    return match ? match[1] : null; // Nếu tìm thấy, trả về chuỗi; nếu không, trả về null
}
function convertStr(str) {
    return String(str).replace(/\\/g, "\\\\").replace(/'/g, "\\'");
}
function convertToSlug(text) {
    if (typeof text !== "string") return "";
    text = text.replace(/[^a-zA-Z0-9\s]/g, "");
    return slugify(text, { lower: true, strict: true, trim: true });
}

const delay = (ms) => new Promise((r) => setTimeout(r, ms));

async function setupPage(page) {
    await page.setExtraHTTPHeaders({
        "Accept-Language": "en-US,en;q=0.9",
    });
    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120 Safari/537.36"
    );
}

async function safeClick(page, selector, timeout = 3000) {
    try {
        await page.waitForSelector(selector, { timeout });
        await page.click(selector);
        return true;
    } catch {
        return false;
    }
}
async function clickArrayFindText(
    page,
    selector,
    textClick = "",
    timeout = 3000
) {
    // 1️⃣ Chờ selector xuất hiện
    await page.waitForSelector(selector, { timeout }).catch(() => false);
    // 2️⃣ Truyền biến vào evaluate
    return page.evaluate(
        (selector, textClick) => {
            const targetText = textClick.toLowerCase();
            const elements = Array.from(document.querySelectorAll(selector));
            const el = elements.find((e) =>
                e.textContent?.trim().toLowerCase().includes(targetText)
            );
            if (el) {
                el.scrollIntoView({ block: "center", behavior: "instant" });
                el.click();
                return true;
            }
            return false;
        },
        selector,
        textClick
    );
}

async function getText(page, selector) {
    try {
        await page.waitForSelector(selector, { timeout: 3000 });
        return await page.$eval(selector, (el) => el.textContent.trim());
    } catch {
        return "";
    }
}

async function simulateHumanBehavior(page) {
    const randomize = (min, max) =>
        Math.floor(Math.random() * (max - min + 1)) + min;

    await page.mouse.move(randomize(0, 100), randomize(0, 100));
    await page.waitForTimeout(WAIT_TIME_SHORT);

    await page.evaluate(() => {
        window.scrollBy({
            top: window.innerHeight / 2,
            left: 0,
            behavior: "smooth",
        });
    });
    await page.waitForTimeout(WAIT_TIME_SHORT);
}

async function crawlerGoogleIframe(browser, record) {
    for (let attempt = 1; attempt <= 5; attempt++) {
        const page = await browser.newPage();
        try {
            await setupPage(page);
            await page.goto(record.link_google_map);

            await simulateHumanBehavior(page);
            await delay(2000);
            await page.goto(record.link_google_map);
            // let data = await extractMainInfo(page);
            let data = {};
            await database.update_crawler_map(record.id, data, 1);
            // if (crawlerData.comment) await crawler_comment(page, record);
            // if (crawlerData.about) await crawler_about(page, record);
            if (crawlerData.menu) await crawlerMenu(page, record);
            // if (crawlerData.images) await crawler_images(page, record);
            await page.close();
            return;
        } catch (e) {
            await page.close();
            console.error(`Retry ${attempt} failed`, e);
            if (attempt === 5) throw e;
        }
    }
}
async function crawlIframeMap(page) {
    const clicked = await safeClick(page, 'button[data-value="Share"]');
    if (!clicked) return "";
    await page
        .waitForSelector('div[jsaction="focus:modal.focus.top"]', {
            timeout: 10000,
        })
        .catch(() => null);
    await safeClick(page, 'button[data-tooltip="Embed a map"]');
    await delay(500);
    await page
        .waitForSelector('input[jsaction="pane.embedMap.clickInput"]', {
            timeout: 5000,
        })
        .catch(() => null);
    let iframe = page.evaluate(() => {
        return (
            document
                .querySelector('input[jsaction="pane.embedMap.clickInput"]')
                ?.getAttribute("value") || ""
        );
    });
    await safeClick(page, 'button[jsaction="modal.close"]');
    return iframe;
}
async function extractMainInfo(page) {
    // 2️⃣ Extract DOM info (Browser)
    const rawData = await page.evaluate(() => {
        const getAttr = (sel, attr) =>
            document.querySelector(sel)?.getAttribute(attr) || "";

        var h1 = document.querySelector("h1");
        var reviewText =
            h1?.parentNode?.parentNode?.textContent?.match(
                /\(([^)]+)\)/
            )?.[1] || "";

        let time_open = "";
        const openHoursEl = document.querySelector(
            'div[data-hide-tooltip-on-mouse-move="true"][role="button"]'
        );

        if (openHoursEl) {
            openHoursEl.closest("div")?.click();
            time_open =
                openHoursEl.parentNode?.querySelector("table")?.outerHTML || "";
        }

        return {
            google_review: reviewText,
            phone: getAttr(
                'button[data-tooltip="Copy phone number"]',
                "aria-label"
            ),
            address: getAttr('button[data-item-id="address"]', "aria-label"),
            thumbnail:
                document.querySelector('button img[decoding="async"]')?.src ||
                "",
            link_google_map: location.href,
            time_open,
        };
    });

    // 1️⃣ Crawl iframe map TRƯỚC (NodeJS)
    const iframe_map = await crawlIframeMap(page);

    // 3️⃣ Escape + normalize tại NodeJS
    return {
        ...rawData,
        iframe_map: convertStr(iframe_map),
        google_review: convertStr(rawData.google_review),
        phone: convertStr(rawData.phone),
        address: convertStr(rawData.address),
        thumbnail: convertStr(rawData.thumbnail),
        time_open: convertStr(rawData.time_open),
    };
}

async function crawlerMenu(page, record) {
    let check = await clickArrayFindText(
        page,
        'div[role="tablist"] button[role="tab"]',
        "menu"
    );
    if (!check) return;
    await delay(1000);

    const tablists = await page.$$('div[role="tablist"]');
    if(tablists.length <= 1) return;
    const lastTab = tablists[tablists.length - 1];
    const buttons = await lastTab.$$("button");
    if (!buttons.length) {
        console.log("❌ No tabs found in lastTablist");
        return;
    }
    await database.execute(`Delete from ${table.product} where crawler_id = ${record.id}`);
    for (const btn of buttons) {
        await btn.click();
        const title = await btn.evaluate((el) => (el.textContent || "").trim());
        if(title.toLowerCase() == 'overview') continue;
        console.log("👉 Click tab:", title);
        // Scroll + click
        await btn.evaluate((el) => el.scrollIntoView({ block: "center", inline: "center" }));
        await btn.click({ delay: 10 });
        // Đợi menu load
        try{
            await page.waitForSelector('div[aria-label="Menu"][role="region"]', {timeout: 1000});
        }catch(e){
            continue;
        }
        await page.waitForTimeout(100);
        // Crawl menu items
        const items = await page.evaluate(() => {
            const domProduct = document.querySelector('div[aria-label="Menu"][role="region"]');
            if (!domProduct) return [];
            return [...domProduct.children].map((row) => {
                const name = row.querySelector("div.fontBodyMedium") ?.textContent?.trim() || "";
                const price = row.querySelector("h2")?.textContent?.trim() || "";
                return { name, price };
            }).filter((item) => item.name);
        });
        if (items.length > 0) { 
            let relate_id = record.relate_id ?? 0;
            let parentSlug = slugify(title, { lower: true });
            let insertParentSql = `INSERT INTO ${table.product} (title, slug, parent_id, relate_id, crawler_id) VALUES ('${convertStr(title)}', '${convertStr(parentSlug)}', 0, ${relate_id}, ${record.id})`;
            let parentResult = await database.execute(insertParentSql);
            let parentId = parentResult.insertId;
            // 👉 Insert children
            for (let child of items) {
                let childSlug = convertStr(slugify(child.name, { lower: true }));
                let insertChildSql = `INSERT INTO ${table.product} (title, slug, price , parent_id, relate_id, crawler_id) VALUES ('${convertStr(child.name)}', '${childSlug}', '${child.price}', ${parentId},  ${relate_id}, ${record.id})`;
                await database.execute(insertChildSql);
            }
            console.log("\nSuccess Menu", title, "(" + items.length + ")");
        }
        await page.waitForTimeout(100);
    }
    return await safeClick(page, 'button[aria-label="Back"]');
}

async function crawler_about(page, record) {
    let check = await clickArrayFindText(
        page,
        'div[role="tablist"] button[role="tab"]',
        "about"
    );
    let abouts = await page.evaluate(() => {
        const list = [];
        // Cuộn nếu cần
        const targetElement = document.querySelector(
            'div[role="region"][tabindex="-1"]'
        );
        if (targetElement) {
            let distance = 5;
            for (let i = 0; i <= 15; i++) {
                targetElement.scrollTop += distance;
            }
            const elements =
                targetElement.querySelectorAll("h2.fontTitleSmall");

            elements.forEach((element) => {
                const parentText = element.textContent?.trim();
                const liElements =
                    element.parentElement.querySelectorAll("ul li");
                const childs = Array.from(liElements).map((li) => {
                    li.querySelector('span[aria-hidden="true"]')?.remove(); // Xóa span nếu có
                    return li.textContent?.trim(); // Trả về nội dung còn lại
                });
                list.push({
                    parent: parentText,
                    childs: childs,
                });
            });
            return list;
        }
        return [];
    });
    if (check) await safeClick(page, 'button[aria-label="Back"]');

    if (abouts.length > 0) {
        const relate_id = record.relate_id ?? 0;
        await database.execute(
            `Delete from ${table.about} where crawler_id = ${record.id}`
        );
        for (const group of abouts) {
            const parentTitle = group.parent;
            const parentSlug = slugify(parentTitle, { lower: true });
            // 👉 Insert parent
            const insertParentSql = `
              INSERT INTO ${
                  table.about
              } (title, slug, parent_id, relate_id, crawler_id)
              VALUES ('${convertStr(parentTitle)}', '${convertStr(
                parentSlug
            )}', 0, ${relate_id}, ${record.id})
            `;
            const parentResult = await database.execute(insertParentSql);
            const parentId = parentResult.insertId;

            // 👉 Insert children
            for (const childTitle of group.childs) {
                const childSlug = convertStr(
                    slugify(childTitle, { lower: true })
                );
                const insertChildSql = `
                INSERT INTO ${
                    table.about
                } (title, slug, parent_id, relate_id, crawler_id)
                VALUES ('${convertStr(
                    childTitle
                )}', '${childSlug}', ${parentId},  ${relate_id}, ${record.id})
              `;
                await database.execute(insertChildSql);
            }
        }
        console.log("==> Success download about");
    }
    return;
}

async function crawler_images(page, record) {
    await page.waitForTimeout(WAIT_TIME_SHORT);
    await page.evaluate(async () => {
        await new Promise((resolve) => setTimeout(resolve, 2000));
        let allButtons = Array.from(
            document.querySelectorAll(
                'button[jslog][jsaction*="heroHeaderImage"]'
            )
        );
        // Click vào nút nếu tồn tại
        if (allButtons[0]) {
            allButtons[0].click();
            return true;
        }
        return false; // Không tìm thấy nút để click
    });

    await page.waitForTimeout(WAIT_TIME_SHORT);
    let thumbnails = await page.evaluate(async () => {
        const seen = new Set();
        const out = [];

        // Vùng cần scroll (fallback sang tài liệu nếu không có container)
        const feed =
            document.querySelector('div[role="main"] div[tabindex="-1"]') ||
            document.scrollingElement ||
            document.body;

        const distance = 800; // px mỗi lần cuộn
        const maxIdle = 10; // số lần cuộn liên tiếp không có ảnh mới -> dừng
        let idle = 0;

        // lấy URL từ <img> hoặc background-image
        const pickUrl = (a) => {
            // 2) background-image
            const el = a.querySelector(
                'div[role="img"] div[style*="background-image"]'
            )?.style?.backgroundImage;
            const m = el && el.match(/url\((['"]?)(.*?)\1\)/i);
            if (m && m[2]) return m[2];
            return null;
        };

        const collect = () => {
            const anchors = document.querySelectorAll("a[data-photo-index]");
            anchors.forEach((a) => {
                const url = pickUrl(a);
                if (url && url.startsWith("https://lh") && !seen.has(url)) {
                    seen.add(url);
                    out.push(url); // "push ảnh vào" ngay khi thấy
                }
            });
        };

        // vòng đời scroll + thu thập
        collect(); // thu thập lần đầu
        while (idle < maxIdle) {
            feed.scrollTop += distance;
            await new Promise((r) => setTimeout(r, 600));
            collect();
            idle++;
        }
        await new Promise((r) => setTimeout(r, 600));
        collect();
        return out;
    });
    let check = await clickArrayFindText(
        page,
        'div[role="tablist"] button[role="tab"]',
        "menu"
    );
    // get image menus
    let menus = [];
    if (check) {
        await page.waitForTimeout(WAIT_TIME_LONG);
        menus = await page.evaluate(async () => {
            const seen = new Set();
            const out = [];

            // Vùng cần scroll (fallback sang tài liệu nếu không có container)
            const feed =
                document.querySelector('div[role="main"] div[tabindex="-1"]') ||
                document.scrollingElement ||
                document.body;

            const distance = 800; // px mỗi lần cuộn
            const maxIdle = 6; // số lần cuộn liên tiếp không có ảnh mới -> dừng
            let idle = 0;

            // lấy URL từ <img> hoặc background-image
            const pickUrl = (a) => {
                // 2) background-image
                const el = a.querySelector(
                    'div[role="img"] div[style*="background-image"]'
                )?.style?.backgroundImage;
                const m = el && el.match(/url\((['"]?)(.*?)\1\)/i);
                if (m && m[2]) return m[2];
                return null;
            };

            const collect = () => {
                const anchors = document.querySelectorAll(
                    'div[role="main"] div[tabindex="-1"] a[data-photo-index]'
                );
                anchors.forEach((a) => {
                    const url = pickUrl(a);
                    if (url && url.startsWith("https://lh") && !seen.has(url)) {
                        seen.add(url);
                        out.push(url); // "push ảnh vào" ngay khi thấy
                    }
                });
            };

            // vòng đời scroll + thu thập
            collect(); // thu thập lần đầu
            while (idle < maxIdle) {
                feed.scrollTop += distance;
                await new Promise((r) => setTimeout(r, 600));
                collect();
                idle++;
            }

            // chờ nốt lazy-load nếu còn
            await new Promise((r) => setTimeout(r, 800));
            collect();
            return out;
        });
    }

    if (thumbnails.length > 0) {
        await downloadFile(thumbnails, "photo", record, 20);
    }
    if (menus.length > 0) {
        await downloadFile(menus, "menu", record);
    }
    return;
}
async function crawler_comment(page, record) {
    // crawler comment:
    try {
        await page.evaluate(async () => {
            let allButtons = Array.from(
                document.querySelectorAll(
                    'div[role="tablist"] button[role="tab"]'
                )
            );

            let button = allButtons.find((button) => {
                const text = button.textContent
                    ? button.textContent.trim().toLowerCase()
                    : "";
                return text === "reviews" || text === "Reviews";
            });
            if (button) button.click();
            return;
        });

        let _select = `select count('id') from ${table.comment} where crawler_id = ${record.id}`;
        let _count = await database.execute(_select);

        if (_count[0]["count('id')"] == 0) {
            let reviews = await page.evaluate(async () => {
                // Đợi 2 giây để đảm bảo dữ liệu đã tải
                await new Promise((resolve) => setTimeout(resolve, 2000));

                let targetElement = document.querySelector(
                    'div[role="main"] div[tabindex="-1"]'
                );
                if (!targetElement) return [];

                let totalHeight = 0;
                const distance = 300; // Khoảng cách cuộn mỗi lần
                const maxScrolls = 10; // Số lần cuộn tối đa
                let i = 0;

                while (i < maxScrolls) {
                    // Cuộn nội dung
                    targetElement.scrollTop += distance;
                    totalHeight += distance;

                    // Chờ để trang tải thêm nội dung
                    await new Promise((resolve) => setTimeout(resolve, 300));

                    // Tìm các nút và nhấp vào
                    let buttons = document.querySelectorAll(
                        "span > button[data-review-id]:first-of-type"
                    );
                    for (let element of buttons) {
                        element.click(); // Nhấp vào các nút review
                    }
                    i++;
                }

                // Thu thập dữ liệu từ các review
                let links = [];
                let all_reviews = document.querySelectorAll(
                    'div[tabindex="-1"][lang="en"]'
                );

                if (all_reviews.length > 0) {
                    for (let element of all_reviews) {
                        // Tìm cha chứa thông tin review
                        let _parent = element.closest(
                            "div[data-review-id][jsaction]"
                        );
                        if (!_parent) continue;

                        // Khởi tạo đối tượng để lưu thông tin
                        let obj = {};

                        // Tìm button liên quan đến reviewer
                        const first = _parent.querySelector(
                            'button[data-review-id][jsaction*="review.reviewerLink"]'
                        );
                        if (!first) continue;
                        if (first) {
                            // Lấy tên người dùng từ aria-label
                            obj.fullname = (
                                first.getAttribute("aria-label")?.trim() ||
                                "Unknown"
                            ).replace("Photo of ", "");
                            obj.src = first
                                .querySelector("img")
                                .getAttribute("src");
                        } else {
                            continue;
                        }

                        // Lấy nội dung review
                        obj.content = element
                            .querySelector("span")
                            ?.textContent.trim();

                        // Thêm vào danh sách links
                        links.push(obj);
                    }
                }

                return links;
            });

            if (reviews.length > 0) {
                let values = reviews.slice(0, 5).map((element, index) => {
                    let newContent = convertStr(element.content);
                    let fullname = convertStr(element.fullname);
                    return `('${fullname}', '${newContent}', 0, '${
                        element.src
                    }', '${record.relate_id ?? 0}', '${record.id}')`;
                });
                await database.execute(
                    `delete from ${table.comment} where crawler_id = ${record.id}`
                );
                let _insert = `INSERT INTO ${
                    table.comment
                } (fullname, content, is_status , thumbnail, data_id, crawler_id) VALUES ${values.join(
                    ", "
                )};`;
                await database.execute(_insert);
            }
        }
        await page.waitForTimeout(WAIT_TIME_SHORT);

        await page.evaluate(async () => {
            let allButtons = Array.from(
                document.querySelectorAll(
                    'div[role="tablist"] button[role="tab"]'
                )
            );
            if (allButtons) allButtons[0].click();
            return;
        });
        console.log("Success Reviews: " + record.key_word);
        return;
    } catch (e) {
        console.log("Error Reviews: " + record.key_word);
    }
}

async function getAllCrawlerDataBase(offset = 0) {
     const query = `SELECT * FROM ${table.crawler} WHERE is_status = 0 ORDER BY id DESC LIMIT 500 offset ${offset}`;
    return database.query(query);
}

(async () => {
    var list_data = await getAllCrawlerDataBase(0);

    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=en-US"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });

    for (let element of list_data) {
        try {
            console.log("\n ===Start key: " + element.key_word);
            await crawlerGoogleIframe(browser, element);
            console.log("Crawler_success key: " + element.key_word);
        } catch (e) {
            console.error("\nCrawler_error: " + element.id + e);
            await database.update_crawler_map(element.id, { is_error: 1 }, 3);
        }
    }

    await browser.close();
    console.log("Done All");
})();

async function downloadFile(results = [], _type = "photo", record, max = 10) {
    //crawler_href
    record.slug = convertStr(convertToSlug(record.slug));
    let values = results
        .map((element, index) => {
            let path = `${folder_path}/${record.slug}/${record.slug}-${_type}-${index}.jpg`;
            return `('${index}', '${path}', '${convertStr(element)}', ${
                record.relate_id ?? 0
            }, ${record.id}, '${_type}')`;
        })
        .slice(0, max);

    let _delete = `DELETE
    FROM ${table.image}
    WHERE crawler_id = ${record.id} and type='${_type}';`;
    await database.execute(_delete);

    let _insert = `INSERT INTO ${
        table.image
    } (position, thumbnail, crawler_href, post_id , crawler_id, type )
    VALUES ${values.join(", ")};`;
    await database.execute(_insert);
    console.log(
        `==> Insert success [${_type}] image: ${values.length} crawler_id = ${record.id}`
    );
}
