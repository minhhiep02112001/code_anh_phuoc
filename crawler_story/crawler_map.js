const puppeteer = require("puppeteer-extra");
const database = require("./database");
const folder_path = "/storage/photos/nails";
const WAIT_TIME_SHORT = 1000;
const WAIT_TIME_LONG = 3000;
const slugify = require("slugify");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");
puppeteer.use(StealthPlugin());

const crawlerData = {
    menu: true,
    infor: true,
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

async function waitForSelectorSafe(
    page,
    selector,
    timeout = 3000,
    options = {},
) {
    try {
        await page.waitForSelector(selector, { timeout, ...options });
        return true;
    } catch {
        return false;
    }
}

async function setupPage(page) {
    await page.setExtraHTTPHeaders({
        "Accept-Language": "en-US,en;q=0.9",
    });
    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120 Safari/537.36",
    );
}

async function gotoAndWaitForPageReady(page, url) {
    await page.goto(url, {
        waitUntil: ["domcontentloaded", "load", "networkidle2"],
        timeout: 60000,
    });

    await page.waitForFunction(
        () => {
            if (document.readyState !== "complete") return false;

            const styleLinksLoaded = Array.from(
                document.querySelectorAll('link[rel="stylesheet"]'),
            ).every((link) => {
                if (link.disabled) return true;
                try {
                    return !!link.sheet;
                } catch {
                    return true;
                }
            });

            return styleLinksLoaded;
        },
        { timeout: 15000, polling: 250 },
    );
}

async function safeClick(page, selector, timeout = 3000, retries = 3) {
    for (let attempt = 1; attempt <= retries; attempt++) {
        try {
            await page.waitForSelector(selector, { timeout, visible: true });
            await page.click(selector);
            await delay(1000);
            return true;
        } catch {
            if (attempt === retries) return false;
            await delay(500);
        }
    }
    return false;
}
async function clickArrayFindText(
    page,
    selector,
    textClick = "",
    timeout = 3000,
) {
    // 1️⃣ Chờ selector xuất hiện
    const found = await waitForSelectorSafe(page, selector, timeout);
    if (!found) return false;
    // 2️⃣ Truyền biến vào evaluate
    return page.evaluate(
        (selector, textClick) => {
            const targetText = textClick.toLowerCase();
            const elements = Array.from(document.querySelectorAll(selector));
            if (elements.length > 0 && textClick == "") {
                elements[0].click();
                return true;
            }
            const el = elements.find((e) =>
                e.textContent?.trim().toLowerCase().includes(targetText),
            );
            if (el) {
                el.scrollIntoView({ block: "center", behavior: "instant" });
                el.click();
                return true;
            }
            return false;
        },
        selector,
        textClick,
    );
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
            await gotoAndWaitForPageReady(page, record.link_google_map);
            await simulateHumanBehavior(page);
            await delay(2000);
            let data = {};
            if (crawlerData.infor) data = await extractMainInfo(page);
            if(!record.slug) data.slug = record.slug = convertToSlug(record.key_word);
            await database.update_crawler_map(record.id, data, 1);
            if (crawlerData.comment) await crawler_comment(page, record);
            if (crawlerData.menu) await crawlerMenu(page, record);
            if (crawlerData.about) await crawler_about(page, record);
            if (crawlerData.images) await crawler_images(page, record);
            return;
        } catch (e) {
            console.error(`Retry ${attempt} failed`, e);
            if (attempt === 5) throw e;
        } finally {
            await page.close();
        }
    }
}

async function crawlIframeMap(page) {
    const clicked = await safeClick(page, 'button[data-value="Share"]');
    if (!clicked) return "";
    await waitForSelectorSafe(page, 'div[jsaction="focus:modal.focus.top"]', 5000);
    await safeClick(
        page,
        'button[data-tooltip-only-on-overflow][data-tooltip="Embed a map"]',
        2000,
        3,
    );

    await waitForSelectorSafe(
        page,
        'input[jsaction="pane.embedMap.clickInput"]',
        5000,
    );

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
                /\(([^)]+)\)/,
            )?.[1] || "";

        let time_open = "";
        const openHoursEl = document.querySelector(
            'div[data-hide-tooltip-on-mouse-move="true"][role="button"]',
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
                "aria-label",
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
    console.log("IFRAME: ", iframe_map);

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
    await delay(200);
    let check = await clickArrayFindText(
        page,
        'div[role="tablist"] button[role="tab"]',
        "menu",
    );
    if (!check) return;
    await delay(1000);
    let _select = `select count('id') from ${table.product} where crawler_id = ${record.id}`;
    let _count = await database.execute(_select);
    if (_count[0]["count('id')"] == 0) {
        const tablists = await page.$$('div[role="tablist"]');
        if (tablists.length <= 1) return;
        const lastTab = tablists[tablists.length - 1];
        const buttons = await lastTab.$$("button");
        if (!buttons.length) {
            console.log("❌ No tabs found in lastTablist");
            return;
        }
        let count = 0;
        for (const btn of buttons) {
            await btn.click();
            const title = await btn.evaluate((el) =>
                (el.textContent || "").trim(),
            );
            if (title.toLowerCase() == "overview") continue;
            // Scroll + click
            await btn.evaluate((el) =>
                el.scrollIntoView({ block: "center", inline: "center" }),
            );
            await btn.click({ delay: 10 });
            // Đợi menu load
            const menuLoaded = await waitForSelectorSafe(
                page,
                'div[aria-label="Menu"][role="region"]',
                1000,
            );
            if (!menuLoaded) continue;
            await page.waitForTimeout(100);
            // Crawl menu items
            const items = await page.evaluate(() => {
                const domProduct = document.querySelector(
                    'div[aria-label="Menu"][role="region"]',
                );
                if (!domProduct) return [];
                return [...domProduct.children]
                    .map((row) => {
                        const name =
                            row
                                .querySelector("div.fontBodyMedium")
                                ?.textContent?.trim() || "";
                        const price =
                            row.querySelector("h2")?.textContent?.trim() || "";
                        return { name, price };
                    })
                    .filter((item) => item.name);
            });
            if (items.length > 0) {
                count += items.length;
                let relate_id = record.relate_id ?? 0;
                let parentSlug = slugify(title, { lower: true });
                let insertParentSql = `INSERT INTO ${
                    table.product
                } (title, slug, parent_id, relate_id, crawler_id) VALUES ('${convertStr(
                    title,
                )}', '${convertStr(parentSlug)}', 0, ${relate_id}, ${
                    record.id
                })`;
                let parentResult = await database.execute(insertParentSql);
                let parentId = parentResult.insertId;
                // 👉 Insert children
                for (let child of items) {
                    let childSlug = convertStr(
                        slugify(child.name, { lower: true }),
                    );
                    let insertChildSql = `INSERT INTO ${
                        table.product
                    } (title, slug, price , parent_id, relate_id, crawler_id) VALUES ('${convertStr(
                        child.name,
                    )}', '${childSlug}', '${
                        child.price
                    }', ${parentId},  ${relate_id}, ${record.id})`;
                    await database.execute(insertChildSql);
                }
            }
            await page.waitForTimeout(100);
        }
        console.log("✅ Crawled Menus: " + count + " record");
    } else {
        console.log(
            "✅ Success Menus Exists: " + _count[0]["count('id')"] + " record",
        );
    }
    return await safeClick(page, 'button[aria-label="Back"]');
}

async function crawler_about(page, record) {
    await delay(200);
    let check = await clickArrayFindText(
        page,
        'div[role="tablist"] button[role="tab"]',
        "about",
    );
    let _select = `select count('id') from ${table.about} where crawler_id = ${record.id}`;
    let _count = await database.execute(_select);
    if (_count[0]["count('id')"] == 0) {
        let abouts = await page.evaluate(() => {
            const list = [];
            // Cuộn nếu cần
            const targetElement = document.querySelector(
                'div[role="region"][tabindex="-1"]',
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
                `Delete from ${table.about} where crawler_id = ${record.id}`,
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
                  parentSlug,
              )}', 0, ${relate_id}, ${record.id})
            `;
                const parentResult = await database.execute(insertParentSql);
                const parentId = parentResult.insertId;

                // 👉 Insert children
                for (const childTitle of group.childs) {
                    const childSlug = convertStr(
                        slugify(childTitle, { lower: true }),
                    );
                    const insertChildSql = `
                INSERT INTO ${
                    table.about
                } (title, slug, parent_id, relate_id, crawler_id)
                VALUES ('${convertStr(
                    childTitle,
                )}', '${childSlug}', ${parentId},  ${relate_id}, ${record.id})
              `;
                    await database.execute(insertChildSql);
                }
            }
            console.log("✅ Crawled About: " + abouts.length + " record");
        }
    } else {
        console.log(
            "✅ Success About Exists: " + _count[0]["count('id')"] + " record",
        );
    }
    return await safeClick(page, 'button[aria-label="Back"]');
}

async function crawler_images(page, record) {
    await delay(1000);
    const result = await clickArrayFindText(
        page,
        'button[jslog][jsaction*="heroHeaderImage"]',
    );
    const maxImage = 20;
    if (!result) return;
    await page.waitForSelector('div[role="main"] div[tabindex="-1"]', {
        timeout: 10000,
    });
    await delay(3000);
    let thumbnails = await page.evaluate(async (maxImage) => {
        const seen = new Set();
        const out = [];

        const feed =
            document.querySelector('div[role="main"] div[tabindex="-1"]') ||
            document.scrollingElement ||
            document.body;

        const distance = 800;
        const maxIdle = 6;
        let idle = 0;

        const pickUrl = (a) => {
            const el = a.querySelector(
                'div[role="img"] div[style*="background-image"]',
            )?.style?.backgroundImage;
            const m = el && el.match(/url\((['"]?)(.*?)\1\)/i);
            return m?.[2] || null;
        };

        const collect = () => {
            let added = 0;
            const anchors = document.querySelectorAll("a[data-photo-index]");
            for (const a of anchors) {
                if (out.length >= maxImage) break;

                const url = pickUrl(a);
                if (url && url.startsWith("https://lh") && !seen.has(url)) {
                    seen.add(url);
                    out.push(url);
                    added++;
                }
            }
            return added;
        };

        // thu thập lần đầu
        collect();
        if (out.length >= maxImage) return out.slice(0, maxImage);

        while (idle < maxIdle && out.length < maxImage) {
            const before = seen.size;

            feed.scrollTop += distance;

            let waited = 0;
            while (waited < 5000 && out.length < maxImage) {
                await new Promise((r) => setTimeout(r, 200));
                collect();
                if (seen.size > before) break;
                waited += 200;
            }

            if (seen.size === before) {
                idle++;
            } else {
                idle = 0;
            }
        }

        return out.slice(0, maxImage);
    }, maxImage);

    let check = await clickArrayFindText(
        page,
        'div[role="tablist"] button[role="tab"]',
        "menu",
    );
    // get image menus
    let menus = [];

    await page.waitForSelector('div[role="main"] div[tabindex="-1"]', {
        timeout: 10000,
    });
    await delay(2000);

    if (check) {
        await page.waitForTimeout(WAIT_TIME_LONG);
        menus = await page.evaluate(async (maxImage) => {
            const seen = new Set();
            const out = [];

            const feed =
                document.querySelector('div[role="main"] div[tabindex="-1"]') ||
                document.scrollingElement ||
                document.body;

            const distance = 700;
            const maxIdle = 3;
            let idle = 0;

            const pickUrl = (a) => {
                const bg = a.querySelector(
                    'div[role="img"] div[style*="background-image"]',
                )?.style?.backgroundImage;
                const m = bg && bg.match(/url\((['"]?)(.*?)\1\)/i);
                return m?.[2] || null;
            };

            const collect = () => {
                let added = 0;
                const anchors = feed.querySelectorAll("a[data-photo-index]");
                for (const a of anchors) {
                    if (out.length >= maxImage) break;

                    const url = pickUrl(a);
                    if (url && url.startsWith("https://lh") && !seen.has(url)) {
                        seen.add(url);
                        out.push(url);
                        added++;
                    }
                }
                return added;
            };

            // lần đầu
            collect();
            if (out.length >= maxImage) return out.slice(0, maxImage);

            while (idle < maxIdle && out.length < maxImage) {
                const before = seen.size;

                feed.scrollTop += distance;

                // 🔥 chờ DOM load thật
                let waited = 0;
                while (waited < 4000 && out.length < maxImage) {
                    await new Promise((r) => setTimeout(r, 200));
                    collect();
                    if (seen.size > before) break;
                    waited += 200;
                }

                if (seen.size === before) {
                    idle++;
                } else {
                    idle = 0;
                }
            }

            return out.slice(0, maxImage);
        }, maxImage);
    }
    if (thumbnails.length > 0) {
        await downloadFile(thumbnails, "photo", record, 20);
    }
    if (menus.length > 0) {
        await downloadFile(menus, "menu", record);
    }
    return await safeClick(page, 'button[aria-label="Back"]');
}

async function crawler_comment(page, record) {
    await delay(300);

    try {
        // 1️⃣ Click tab Reviews
        const opened = await clickArrayFindText(
            page,
            'div[role="tablist"] button[role="tab"]',
            "reviews",
        );
        if (!opened) return;
        await delay(500);
        let _select = `select count('id') from ${table.comment} where crawler_id = ${record.id}`;
        let _count = await database.execute(_select);
        if (_count[0]["count('id')"] == 0) {
            const reviews = await page.evaluate(async () => {
                const sleep = (ms) => new Promise((r) => setTimeout(r, ms));

                const normalize = (str = "") =>
                    str
                        .toLowerCase()
                        .replace(/\s+/g, " ")
                        .replace(/[^\p{L}\p{N} ]/gu, "")
                        .trim();

                const container = document.querySelector(
                    'div[role="main"] div[tabindex="-1"]',
                );
                if (!container) return [];

                const results = [];
                const seen = new Set();

                const MAX_SCROLL = 40;
                const SCROLL_STEP = 500;

                for (let i = 0; i < MAX_SCROLL; i++) {
                    // scroll
                    container.scrollTop += SCROLL_STEP;
                    await sleep(100);

                    // mở full content
                    document
                        .querySelectorAll("span > button[data-review-id]")
                        .forEach((btn) => btn.click());

                    await sleep(100);

                    const reviewParents = document.querySelectorAll(
                        "div[data-review-id][jsaction]",
                    );
                    for (const parent of reviewParents) {
                        const nameBtn = parent.querySelector(
                            'button[jsaction*="review.reviewerLink"]',
                        );

                        const contentEl = parent.querySelector(
                            'div[tabindex="-1"][lang]',
                        );

                        const fullname =
                            nameBtn
                                ?.getAttribute("aria-label")
                                ?.replace("Photo of ", "")
                                ?.trim() || "Unknown";

                        const content = contentEl?.innerText?.trim() || "";

                        // 🔑 KEY CHỐNG TRÙNG (KHÔNG DÙNG review_id)
                        const _key = normalize(
                            fullname + " " + content.slice(0, 100),
                        );

                        if (!_key || seen.has(_key)) continue;

                        seen.add(_key);
                        results.push({
                            _key,
                            fullname,
                            src: nameBtn?.querySelector("img")?.src || null,
                            content,
                        });
                    }
                }

                return results;
            });

            if (!reviews.length) {
                console.log("No reviews found:", record.key_word);
                return;
            }

            // 3️⃣ Insert DB (không delete all)
            const values = reviews.slice(0, 50).map((r) => {
                const fullname = convertStr(r.fullname);
                const content = convertStr(r.content);
                return `('${fullname}','${content}',0,'${r.src}', '${
                    record.relate_id ?? 0
                }','${record.id}')`;
            });

            if (values.length) {
                const sql = `INSERT IGNORE INTO ${
                    table.comment
                } (fullname, content, is_status, thumbnail, data_id, crawler_id) VALUES ${values.join(
                    ",",
                )} `;
                await database.execute(sql);
            }

            console.log(`✅ Crawled Reviews: ${reviews.length} record`);
        } else {
            console.log(
                "✅ Success Reviews Exists: " +
                    _count[0]["count('id')"] +
                    " record",
            );
        }
        await safeClick(page, 'button[aria-label="Back"]');
    } catch (e) {
        console.error("❌ Error Reviews:", record.key_word, e.message);
    }
}

async function getAllCrawlerDataBase(offset = 0) {
    // const query = `SELECT * FROM ${table.crawler} WHERE is_status = 0 ORDER BY id ASC LIMIT 500 offset ${offset}`;
    const query = `SELECT * FROM ${table.crawler} WHERE is_status = 0 ORDER BY id DESC LIMIT 100 offset ${offset}`;
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
            console.error("Crawler_error: " + element.id + e);
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
        `==> Insert success [${_type}] image: ${values.length} crawler_id = ${record.id}`,
    );
}
