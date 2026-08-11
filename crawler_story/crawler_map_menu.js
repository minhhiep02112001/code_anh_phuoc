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

function convertStr(str) {
    return String(str).replace(/\\/g, "\\\\").replace(/'/g, "\\'");
}

function convertToSlug(text) {
    if (typeof text !== "string") return "";
    text = text.replace(/[^a-zA-Z0-9\s]/g, "");
    return slugify(text, {
        lower: true,
        strict: true,
        trim: true
    });
}

const delay = (ms) => new Promise((r) => setTimeout(r, ms));

async function waitForSelectorSafe(page, selector, timeout = 3000, options = {}) {
    try {
        await page.waitForSelector(selector, {
            timeout,
            ...options
        });
        return true;
    } catch {
        return false;
    }
}

const REGION_AU = {
    acceptLanguage: "en-AU,en;q=0.9",
    locale: "en-AU",
    timezone: "Australia/Sydney",
    geolocation: {
        latitude: -33.8688,
        longitude: 151.2093
    },
    userAgent: "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36",
};

async function getCdpSession(page) {
    if (typeof page.createCDPSession === "function") {
        return page.createCDPSession();
    }
    return page.target().createCDPSession();
}

async function setupPage(page) {
    await page.setExtraHTTPHeaders({
        "Accept-Language": REGION_AU.acceptLanguage,
    });
    await page.setUserAgent(REGION_AU.userAgent);

    if (typeof page.emulateTimezone === "function") {
        await page.emulateTimezone(REGION_AU.timezone);
    }

    try {
        const client = await getCdpSession(page);
        await client.send("Emulation.setLocaleOverride", {
            locale: REGION_AU.locale,
        });
        await client.send("Emulation.setGeolocationOverride", {
            ...REGION_AU.geolocation,
            accuracy: 50,
        });
    } catch (e) {
        console.warn("CDP locale/geolocation skipped:", e.message);
    }
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
        }, {
            timeout: 15000,
            polling: 250
        },
    );

    await waitForSelectorSafe(page, 'button[data-value="Share"], h1', 20000, {
        visible: true,
    });
    await delay(500);
}

async function safeClick(page, selector, timeout = 3000, retries = 3) {
    for (let attempt = 1; attempt <= retries; attempt++) {
        try {
            await page.waitForSelector(selector, {
                timeout,
                visible: true
            });
            const el = await page.$(selector);
            if (!el) throw new Error("not found");
            await el.evaluate((node) =>
                node.scrollIntoView({
                    block: "center",
                    inline: "center"
                }),
            );
            await el.click({
                delay: 30
            });
            await delay(800);
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
                el.scrollIntoView({
                    block: "center",
                    behavior: "instant"
                });
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
            await safeClick(page, 'button[aria-label="Back"]');
            await delay(1000);
            let data = {};
            await crawler_images(page, record);
            await crawlerMenu(page, record);
            return;
        } catch (e) {
            console.error(`Retry ${attempt} failed`, e);
            if (attempt === 5) throw e;
        } finally {
            await page.close();
        }
    }
}


async function crawlerMenu(page, record) {
    await delay(500);
    let check = await clickArrayFindText(page, 'div[role="tablist"] button[role="tab"]', "menu");
    if (!check) {
        console.log("❌ No menu found");
        return;
    }
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
                el.scrollIntoView({
                    block: "center",
                    inline: "center"
                }),
            );
            await btn.click({
                delay: 10
            });
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
                            .querySelector("div.fontBodyMedium")?.textContent?.trim() || "";
                        const price =
                            row.querySelector("h2")?.textContent?.trim() || "";
                        return {
                            name,
                            price
                        };
                    })
                    .filter((item) => item.name);
            });
            if (items.length > 0) {
                count += items.length;
                let relate_id = record.relate_id ?? 0;
                let parentSlug = slugify(title, {
                    lower: true
                });
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
                        slugify(child.name, {
                            lower: true
                        }),
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
        console.log(`✅ Success Menus Exists: ${_count[0]["count('id')"]} record`);
    }
    return await safeClick(page, 'button[aria-label="Back"]');
}

async function crawler_images(page, record) {
    await delay(WAIT_TIME_SHORT);
    const result = await clickArrayFindText(page, 'button[jslog][jsaction*="heroHeaderImage"]');
    const maxImage = 20;
    if (!result) return;
    await delay(WAIT_TIME_LONG);

    await page.waitForSelector('div[role="main"] div[tabindex="-1"]', {
        timeout: 20000
    });
    let check = await clickArrayFindText(page, 'div[role="tablist"] button[role="tab"]', "menu");
    // get image menus
    await page.waitForSelector('div[role="main"] div[tabindex="-1"]', {
        timeout: 20000,
    });
    let menus = [];
    if (check) {
        await page.waitForTimeout(WAIT_TIME_LONG);
        let menus = await page.evaluate(async (maxImage) => {
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
        if (menus.length > 0) {
            await downloadFile(menus, "menu", record);
        }
    } else {
        console.log("❌ No image menu found");
        return;
    }
    return await safeClick(page, 'button[aria-label="Back"]');
}

async function getAllCrawlerDataBase(offset = 0) {
    const query = `SELECT * FROM ${table.crawler} WHERE is_status=0 and language = 'au' ORDER BY id ASC LIMIT 100 offset ${offset}`;
    // const query = `SELECT * FROM ${table.crawler} WHERE id=160938 and language = 'au' ORDER BY id DESC LIMIT 200 offset ${offset}`;

    // const query = `SELECT * FROM ${table.crawler} WHERE language = 'au'  ORDER BY id ASC LIMIT 200 offset ${offset}`;
    return database.query(query);
}

(async () => {
    var list_data = await getAllCrawlerDataBase(60);

    const browser = await puppeteer.launch({
        headless: false,
        args: ["--start-maximized", "--lang=en-AU", "--accept-lang=en-AU"],
        defaultViewport: null,
    });

    const ctx = browser.defaultBrowserContext();
    for (const origin of [
            "https://www.google.com",
            "https://maps.google.com",
        ]) {
        await ctx.overridePermissions(origin, ["geolocation"]);
    }

    for (let element of list_data) {
        try {
            console.log("\n ===Start key: " + element.key_word);
            await crawlerGoogleIframe(browser, element);
            await database.update_crawler_map(element.id, {
                is_status: 1
            }, 1);
            console.log("Crawler_success key: " + element.key_word);
        } catch (e) {
            console.error("Crawler_error: " + element.id + e);
            await database.update_crawler_map(element.id, {
                is_error: 1
            }, 3);
        }
    }

    await browser.close();
    console.log("Done All");
})();

async function downloadFile(results = [], _type = "photo", record, max = 10) {
    //crawler_href
    record.slug = convertStr(convertToSlug(record.key_word));
    let values = results
        .map((element, index) => {
            let path = `${folder_path}/${record.slug}/${record.slug}-${_type}-${index}.jpg`;
            return `('${index}', '${path}', '${convertStr(element)}', ${
                record.relate_id ?? 0
            }, ${record.id}, '${_type}')`;
        })
        .slice(0, max);

    let _delete = `DELETE FROM ${table.image} WHERE crawler_id = ${record.id} and type='${_type}';`;
    await database.execute(_delete);
    let _insert = `INSERT INTO ${table.image} (position, thumbnail, crawler_href, post_id , crawler_id, type ) VALUES ${values.join(", ")};`;
    await database.execute(_insert);
    console.log(
        `==> Insert success [${_type}] image: ${values.length} crawler_id = ${record.id}`,
    );
}
