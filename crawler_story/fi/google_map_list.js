const puppeteer = require("puppeteer-extra");
const randomUseragent = require("random-useragent");
const Helper = require("../Helper/Function");
const database = require("./database");
const folder_path = "/storage/";
const fs = require("fs");
const WAIT_TIME_SHORT = 1000;
const WAIT_TIME_LONG = 3000;

function extractInParentheses(text) {
    const match = text.match(/\(([^)]+)\)/); // Tìm chuỗi bên trong dấu ()
    return match ? match[1] : null; // Nếu tìm thấy, trả về chuỗi; nếu không, trả về null
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

async function setupPage(page) {
    await page.setExtraHTTPHeaders({
        "Accept-Language": "en-US,en;q=0.9",
        "Accept-Encoding": "gzip, deflate, br",
    });

    const userAgent = randomUseragent.getRandom();
    await page.setUserAgent(userAgent);
}

async function initializeBrowser() {
    return puppeteer.launch({
        headless: false,
        args: ["--start-maximized", "--lang=en-US"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });
}
function convertStr(str) {
    return str.replace(/'/g, "''");
}
async function searchData(keyword, browser, crawler_id = 0) {
    const page = await browser.newPage();
    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36"
    );
    // // // Điều hướng đến trang đăng nhập Google
    await page.goto("https://www.google.fi/maps");

    await page.waitForNavigation({
        waitUntil: "networkidle2", // Đợi đến khi không còn yêu cầu mạng đang xử lý
        timeout: 120000,
    });

    await page.waitForSelector('input[id="searchboxinput"]', {
        timeout: 120000,
    });

    await page.click('input[id="searchboxinput"]');

    await page.waitForSelector('input[id="searchboxinput"]');
    await page.type('input[id="searchboxinput"]', keyword, {
        delay: 100,
    });
    await page.keyboard.press("Enter");
    await page.waitForTimeout(15000); 
    let datas = await page.evaluate(async () => {
        const restaurants = [];
        await new Promise((resolve) => setTimeout(resolve, 1000));
        // Cuộn nội dung nếu cần
        var targetElement = document.querySelector(
            'div[role="main"] div[tabindex="-1"] '
        );

        if (targetElement) {
            if (targetElement.querySelector('div[role="feed"]')) {
                targetElement = targetElement.querySelector('div[role="feed"]');
            }
            let totalHeight = 0;
            const distance = 500;
            let i = 0;
            while (i <= 100) {
                targetElement.scrollTop += distance;
                totalHeight += distance;
                await new Promise((resolve) => setTimeout(resolve, 500));
                i++;
            }

            await new Promise((resolve) => setTimeout(resolve, 1000));

            const elements = targetElement.querySelectorAll(
                ".fontBodyMedium .fontHeadlineSmall"
            );
            for (const element of elements) {
                let obj = {};
                // let headlineElements = element.querySelectorAll(".fontHeadlineSmall");
                obj.title = element.textContent;
                let _parent = element.closest(".fontBodyMedium");
                if (_parent.querySelector(".fontBodyMedium")) {
                    obj.view =
                        _parent.querySelector(".fontBodyMedium").textContent;
                }

                let _parentE = element.closest("div[jsaction]");
                if (_parentE) {
                    let a = _parentE.querySelector('a[target="_blank"]');
                    let link_gg_map =
                        _parentE.querySelector("a[jsaction][jslog]");
                    if (a) {
                        obj.website = a.getAttribute("href");
                    }
                    if (link_gg_map) {
                        obj.link_gg_map = link_gg_map.getAttribute("href");
                    }
                }
                restaurants.push(obj);
            }
        }
        return restaurants;
    });

    // lưu database:
    if (datas.length > 0) {
        for (let element of datas) {
            let obj = {
                key_word: convertStr(element.title),
                slug: convertStr(Helper.convertToSlug(element.title)),
                link_google_map: convertStr(element.link_gg_map ?? ""),
                website: convertStr(element.website ?? ""),
                google_review: extractInParentheses(element.view ?? ""),
                crawler_id,
            };
            await database.handle_crawler_map(obj);
            console.log("\n Success: " + element.title);
        }
    }
    return await page.close();
}

async function getAllCrawlerDataBase(offset = 0) {
    const query = ` SELECT * FROM crawler WHERE status = 0 ORDER BY id ASC LIMIT 5000 offset ${offset}`;
    return database.query(query);
}

(async () => {
    let arr_crawlers = await getAllCrawlerDataBase(0);

    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=fi-FI"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });

    for (const element of arr_crawlers) {
        try {
            console.log("\n Run --------------------" + element.keyword);
            await searchData(element.keyword, browser, element.id);
            let updateStatusQuery = ` UPDATE crawler SET status = 1 WHERE id=${element.id}`;
            await database.execute(updateStatusQuery);
        } catch (e) {
            console.log("\n Run Error --------------------" + element.id);
            let updateStatusQuery = ` UPDATE crawler SET status = 3 WHERE id=${element.id}`;
            await database.execute(updateStatusQuery);
        }
    }
    await browser.close();
    console.log("Done All");

    return;
})();
