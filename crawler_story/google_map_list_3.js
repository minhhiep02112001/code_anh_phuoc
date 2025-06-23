const puppeteer = require("puppeteer-extra");
const Helper = require("./Helper/Function");
const database = require("./Helper/database");
function extractInParentheses(text) {
    const match = text.match(/\(([^)]+)\)/); // Tìm chuỗi bên trong dấu ()
    return match ? match[1] : null; // Nếu tìm thấy, trả về chuỗi; nếu không, trả về null
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
    await page.goto("https://www.google.us/maps");

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
    await page.waitForTimeout(20000);
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
            const distance = 1000;
            let i = 0;
            while (i <= 100) {
                targetElement.scrollTop += distance;
                totalHeight += distance;
                await new Promise((resolve) => setTimeout(resolve, 700));
                i++;
            }
            await new Promise((resolve) => setTimeout(resolve, 500));
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
        }
        console.log(`\n Success: ${crawler_id} - count: ${datas.length} !!!!`);
        let updateStatusQuery = ` UPDATE crawler SET status = 1 WHERE id=${crawler_id}`;
        await database.execute(updateStatusQuery);
    } else {
        let updateStatusQuery = ` UPDATE crawler SET status = 0 WHERE id=${crawler_id}`;
        console.log(`\n => Error: ${crawler_id} - count: 0`);
        await database.execute(updateStatusQuery);
    }
    return await page.close();
}

async function getAllCrawlerDataBase(offset = 0) {
    const query = ` SELECT * FROM crawler WHERE status = 0 ORDER BY id ASC LIMIT 100 offset ${offset}`;
    return database.query(query);
}

(async () => {
    const browser = await puppeteer.launch({
        headless: true, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=en-US"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });

    while (true) {
        let arr_crawlers = await getAllCrawlerDataBase(400);
        if (arr_crawlers.length == 0) break;
        for (const element of arr_crawlers) {
            try {
                console.log(
                    "\n Run --------------------" +
                        element.keyword +
                        " --- " +
                        element.id
                );
                await searchData(element.keyword, browser, element.id);
            } catch (e) {
                console.log(e);

                console.log("\n Run Error --------------------" + element.id);
                let updateStatusQuery = ` UPDATE crawler SET status = 3 WHERE id=${element.id}`;
                await database.execute(updateStatusQuery);
            }
        }
    }

    await browser.close();
    console.log("Done All");

    return;
})();
