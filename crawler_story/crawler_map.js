const puppeteer = require("puppeteer-extra");
const database = require("./database");
const folder_path = "/storage/photos/nails";
const WAIT_TIME_SHORT = 1000;
const WAIT_TIME_SHORTLONG = 3000;
const WAIT_TIME_LONG = 3000;
const slugify = require("slugify");

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
    return str.replace(/'/g, "''");
}
function convertToSlug(text) {
    if (typeof text !== "string") return "";
    text = text.replace(/[^a-zA-Z0-9\s]/g, "");
    return slugify(text, { lower: true, strict: true, trim: true });
}

async function crawlerGoogleIframe(browser, record, retry = 5) {
    let url = record.link_google_map;
    let crawler_id = record.id;
    var page = await browser.newPage();

    await page.setExtraHTTPHeaders({
        "Accept-Language": "en-US,en;q=0.9,en-US;q=0.8,en;q=0.7",
    });
    // Đặt user-agent với thông tin ngôn ngữ tiếng Pháp
    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Accept-Language: en-US"
    );

    try {
        if (!url) {
            console.error(`Error: Failed to decode URL for ${url}`);
            return;
        }
        // Điều hướng đến URL
        await page.goto(url, { waitUntil: "networkidle2" });
        await page.waitForTimeout(WAIT_TIME_SHORT);

        await simulateHumanBehavior(page);

        // Chờ đợi cho nội dung tải xong
        await page.waitForTimeout(WAIT_TIME_SHORTLONG);

       await crawler_comment(page, record);
        await database.update_crawler_map(crawler_id, {}, 1);
        // get ảnh thumbnail
        await page.close();
        return;

        var link_google_map = await page.url();

        const data_update = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 2000));
            let obj = {};
            // Tìm tất cả các nút
            obj.google_review =
                document.querySelector("h1").parentNode.parentNode.textContent;

            let buttonImage = document.querySelectorAll(
                'button img[decoding="async"]'
            );

            let addressButton = document.querySelector(
                'button[data-item-id="address"]'
            );
            let phoneButton = document.querySelector(
                'button[data-tooltip="Copy phone number"]'
            );

            // Lấy giờ mở cửa (ví dụ: "Closed · Opens 10AM")
            const openHoursEl = document.querySelector(
                'div[data-hide-tooltip-on-mouse-move="true"][role="button"]'
            );
            if (openHoursEl) {
                openHoursEl.closest("div").click();
                const table = openHoursEl.parentNode.querySelector("table");
                obj.time_open = table ? table.outerHTML : null;
            }

            obj.phone = phoneButton
                ? phoneButton.getAttribute("aria-label")
                : "";

            obj.address = addressButton
                ? addressButton.getAttribute("aria-label")
                : "";

            obj.thumbnail = buttonImage[0]
                ? buttonImage[0].getAttribute("src")
                : "";

            return obj; // Không tìm thấy nút để click
        });
        // Sử dụng Puppeteer để kiểm tra và click nếu nút tồn tại
        const buttonClicked = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 1500));
            const button = document.querySelector('button[data-value="Share"]');

            // Click vào nút nếu tồn tại
            if (button) {
                button.click();
                return true; // Đánh dấu đã click
            }
            return false; // Không tìm thấy nút để click
        });
        if (!buttonClicked) {
            await page.close();
            console.log("Button not found.");
            if (retry > 0) {
                console.warn(
                    `Warning: No title found, retrying... (Retry count: ${retry})`
                );
                return await crawlerGoogleIframe(browser, record, retry - 1);
            }
            return;
        }
        await page.waitForTimeout(WAIT_TIME_SHORT);
        // get image menus
        data_update.link_google_map = link_google_map;
        data_update.iframe_map = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 1000));
            let tabs = document.querySelectorAll(
                'button[data-tooltip-only-on-overflow="true"]'
            );
            await new Promise((resolve) => setTimeout(resolve, 1000));
            if (tabs.length) {
                tabs[1].click(); // Click vào phần tử cha bậc 2
            } else {
                let btn = document.querySelector(
                    'div[id="app-container-Embed a map"]'
                );
                if (btn) btn.click();
            }
            await new Promise((resolve) => setTimeout(resolve, 2000));

            let elements = document.querySelector(
                'input[jsaction="pane.embedMap.clickInput"]'
            );
            if (elements) {
                // Click vào phần tử cha bậc 2
                return elements.getAttribute("value");
            }

            return "";
        });

        await page.evaluate(() => {
            const modal = document.getElementById("modal-dialog"); // Lấy phần tử modal
            if (modal) {
                modal.remove(); // Xóa phần tử modal khỏi DOM
            }
        });

        data_update.google_review = extractInParentheses(
            data_update.google_review
        );
        data_update.iframe_map = convertStr(data_update.iframe_map);
        data_update.address = convertStr(data_update.address ?? "");
        data_update.email = convertStr(data_update.email ?? "");
        data_update.thumbnail = convertStr(data_update.thumbnail ?? "");
        data_update.phone = convertStr(data_update.phone ?? "");
        data_update.time_open = data_update.time_open
            ? convertStr(data_update.time_open ?? "")
            : "";
        record.slug = data_update.slug = slugify(record.key_word, {
            lower: true,
        });
        data_update.google_review = convertStr(data_update.google_review ?? "");
        data_update.is_crawler_iframe_map = data_update.iframe_map ? 1 : 0;
        await database.update_crawler_map(crawler_id, data_update, 1);
        if (crawlerData.comment) await crawler_comment(page, record);
        if (crawlerData.about) await crawler_about(page, record);
        if (crawlerData.menu) await crawlerMenu(page, record);
        if (crawlerData.images) await crawler_images(page, record);
        // get ảnh thumbnail
        await page.close();
        return;
    } catch (error) {
        await page.close();
        console.error("Error crawling " + url, error);
        return false;
    }
}

async function crawlerMenu(page, record) {
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
                return text === "menu" || text === "Menus";
            });
            if (button) {
                button.click();
                return true;
            }
            return false;
        });
        await page.waitForTimeout(WAIT_TIME_SHORT);
        const checkMenu = await page.evaluate(() => {
            const lists = document.querySelectorAll('div[role="tablist"]');
            return lists.length > 1;
        });

        if (checkMenu) {
            // lấy node tablist thứ 2
            const tablists = await page.$$('div[role="tablist"]');
            const tablist = tablists[1];

            // lấy tất cả tab (category)
            let tabs = await tablist.$$('button[role="tab"]');
            await database.execute(
                `Delete from ${table.product} where crawler_id = ${record.id}`
            );
            for (let i = 1; i < tabs.length; i++) {
                console.log("\n Click " + tabs[i]);
                // lấy tiêu đề tab
                const title = await tabs[i].evaluate((el) =>
                    (el.textContent || "").trim()
                );
                // cuộn tab vào giữa rồi click
                await tabs[i].evaluate((el) =>
                    el.scrollIntoView({ block: "center", inline: "center" })
                );
                await tabs[i].click({ delay: 50 });

                // đợi tab được chọn
                await page.waitForTimeout(200);
                const items = await page.evaluate((tabEl) => {
                    // Bây giờ tabEl là một DOM element thật, có thể dùng closest
                    const domProduct = document.querySelector(
                        'div[aria-label="Menu"][role="region"]'
                    );
                    if (!domProduct) return [];

                    // Lấy tất cả con cấp 1
                    const rows = Array.from(domProduct.children);

                    const data = rows
                        .map((row) => {
                            const name =
                                row
                                    .querySelector("div.fontBodyMedium")
                                    ?.textContent?.trim() || "";

                            const price =
                                row.querySelector("h2")?.textContent?.trim() ||
                                "";

                            return { name, price };
                        })
                        .filter((item) => item.name);
                    return data;
                }, tabs[i]); // <-- phải truyền tabs[i] ở đây
                if (items.length > 0) {
                    let relate_id = record.relate_id ?? 0;
                    let parentSlug = slugify(title, { lower: true });
                    let insertParentSql = `
                        INSERT INTO ${
                            table.product
                        } (title, slug, parent_id, relate_id, crawler_id)
                        VALUES ('${convertStr(title)}', '${convertStr(
                        parentSlug
                    )}', 0, ${relate_id}, ${record.id})`;
                    let parentResult = await database.execute(insertParentSql);
                    let parentId = parentResult.insertId;

                    // 👉 Insert children
                    for (let child of items) {
                        let childSlug = convertStr(
                            slugify(child.name, { lower: true })
                        );
                        let insertChildSql = `
                        INSERT INTO ${
                            table.product
                        } (title, slug, price , parent_id, relate_id, crawler_id)
                        VALUES ('${convertStr(child.name)}', '${childSlug}', '${
                            child.price
                        }', ${parentId},  ${relate_id}, ${record.id})`;
                        await database.execute(insertChildSql);
                    }
                    console.log(
                        "\nSuccess Menu",
                        title,
                        "(" + items.length + ")"
                    );
                }
                // NOTE: DOM Maps hay thay đổi -> lấy lại danh sách tabs mỗi vòng
                tabs = await tablist.$$('button[role="tab"]');
            }
            await page.evaluate(async () => {
                let allButtons = Array.from(
                    document.querySelectorAll(
                        'div[role="tablist"] button[role="tab"]'
                    )
                );
                if (allButtons) allButtons[0].click();
                return;
            });
            console.log("==> Success Menus: " + record.key_word);
        } else {
            console.log("Menus Null: " + record.key_word);
        }
        return;
    } catch (e) {
        console.log("Error Menu: " + record.key_word);
    }
}

async function crawler_about(page, record) {
    await page.waitForTimeout(WAIT_TIME_SHORT);
    await page.evaluate(async () => {
        let allButtons = Array.from(
            document.querySelectorAll('div[role="tablist"] button[role="tab"]')
        );

        let button = allButtons.find((button) => {
            const text = button.textContent
                ? button.textContent.trim().toLowerCase()
                : "";
            return text === "about" || text === "About";
        });
        if (button) button.click();
        return;
    });

    await page.waitForTimeout(WAIT_TIME_SHORT);

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
                const parentText = element.textContent.trim();
                const parentDom = element.parentElement;

                const liElements = parentDom.querySelectorAll("ul li");
                const childs = Array.from(liElements).map((li) => {
                    const span = li.querySelector('span[aria-hidden="true"]');
                    if (span) span.remove(); // Xóa span nếu có
                    return li.textContent.trim(); // Trả về nội dung còn lại
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
        await page.evaluate(async () => {
            let allButtons = Array.from(
                document.querySelectorAll(
                    'div[role="tablist"] button[role="tab"]'
                )
            );
            if (allButtons) allButtons[0].click();
            return;
        });
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
        const maxIdle = 7; // số lần cuộn liên tiếp không có ảnh mới -> dừng
        let idle = 0;

        // lấy URL từ <img> hoặc background-image
        const pickUrl = (a) => {
            // 1) <img>
            const img = a.querySelector("img");
            if (img) {
                if (img.currentSrc) return img.currentSrc;
                if (img.src) return img.src;
                if (img.srcset) {
                    // lấy bản lớn nhất trong srcset
                    const last = img.srcset.split(",").pop();
                    if (last) return last.trim().split(" ")[0];
                }
            }
            // 2) background-image
            const el =
                a.querySelector("div.loaded") ||
                a.querySelector('[style*="background-image"]');
            if (el) {
                const bg =
                    el.style.backgroundImage ||
                    getComputedStyle(el).backgroundImage;
                const m = bg && bg.match(/url\((['"]?)(.*?)\1\)/i);
                if (m && m[2]) return m[2];
            }
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
        collect();
        // chờ nốt lazy-load nếu còn
        await new Promise((resolve) => setTimeout(resolve, 1000));

        let allButtons = Array.from(
            document.querySelectorAll('button[role="tab"]')
        );

        let button = allButtons.find((button) => {
            const text = button.textContent
                ? button.textContent.trim().toLowerCase()
                : "";
            return text === "menu" || text === "Menu";
        });
        if (button) button.click();
        return out;
    });

    await page.waitForTimeout(WAIT_TIME_LONG);
    // get image menus
    let menus = [];
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
            // 1) <img>
            const img = a.querySelector("img");
            if (img) {
                if (img.currentSrc) return img.currentSrc;
                if (img.src) return img.src;
                if (img.srcset) {
                    // lấy bản lớn nhất trong srcset
                    const last = img.srcset.split(",").pop();
                    if (last) return last.trim().split(" ")[0];
                }
            }
            // 2) background-image
            const el =
                a.querySelector("div.loaded") ||
                a.querySelector('[style*="background-image"]');
            if (el) {
                const bg =
                    el.style.backgroundImage ||
                    getComputedStyle(el).backgroundImage;
                const m = bg && bg.match(/url\((['"]?)(.*?)\1\)/i);
                if (m && m[2]) return m[2];
            }
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

        // chờ nốt lazy-load nếu còn
        await new Promise((r) => setTimeout(r, 800));
        collect();
        return out;
    });

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

async function getAllCrawlerDataBase(offset = 0) {
    const query = `SELECT * FROM ${table.crawler} WHERE is_status = 0 ORDER BY id DESC LIMIT 500 offset ${offset}`;
    return database.query(query);
}

(async () => {
    var list_data = await getAllCrawlerDataBase(1450);

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
