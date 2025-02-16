const puppeteer = require("puppeteer-extra");
const randomUseragent = require("random-useragent");
const Helper = require("./Helper/Function");
const database = require("./Helper/database");
const cheerio = require("cheerio");
const folder = "../public/storage/";
const folder_path = "/storage/";
const fs = require("fs");
const axios = require("axios");
const path = require("path");

const FormData = require("form-data");
const WAIT_TIME_SHORT = 1000;
const WAIT_TIME_SHORTLONG = 5000;
const WAIT_TIME_LONG = 7000;

const config_mails = [
    { email: "co.bbidella54@gmail.com", password: "Kingseo127@123#" },
    // { email: "lancas.terjaney53@gmail.com", password: "wFWvdSQWCDA" },
    { email: "gotoiceland9@gmail.com", password: "GY2BJyixydbeU61" },
];

async function crawlerGoogleIframe(browser, record, retry = 5) {
    let url = record.link_google_map;
    let crawler_id = record.id;
    var page = await browser.newPage();

    await page.setExtraHTTPHeaders({
        "Accept-Language": "fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7",
    });
    // Đặt user-agent với thông tin ngôn ngữ tiếng Pháp
    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Accept-Language: fr-FR"
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
        await page.waitForTimeout(WAIT_TIME_LONG);

        const thumbnailSrc = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 2000));

            // Tìm tất cả các nút
            const allButtons = document.querySelectorAll(
                'button img[decoding="async"]'
            );

            // Click vào nút nếu tồn tại
            if (allButtons[0]) {
                return allButtons[0].getAttribute("src");
            }
            return null; // Không tìm thấy nút để click
        });
        // Sử dụng Puppeteer để kiểm tra và click nếu nút tồn tại
        const buttonClicked = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 1000));

            // Tìm tất cả các nút
            const allButtons = Array.from(document.querySelectorAll("button"));

            // Lọc các nút có jsaction chứa ".heroHeaderImage"
            const button = allButtons.find((button) => {
                const jsaction = button.getAttribute("data-value") || "";
                return jsaction == "Partager"; // Kiểm tra bằng RegEx
            });

            // Click vào nút nếu tồn tại
            if (button) {
                button.click();
                return true; // Đánh dấu đã click
            }
            return false; // Không tìm thấy nút để click
        });

        if (buttonClicked) {
            console.log("Button clicked successfully.");
        } else {
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
        let iframe = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 1000));
            let tabs = document.querySelectorAll(
                'button[data-tooltip-only-on-overflow="true"]'
            );
            await new Promise((resolve) => setTimeout(resolve, 1000));
            if (tabs.length) {
                tabs[1].click(); // Click vào phần tử cha bậc 2
            }
            await new Promise((resolve) => setTimeout(resolve, 2000));

            let elements = document.querySelector(
                'input[jsaction="pane.embedMap.clickInput"]'
            );
            if (elements) {
                return elements.getAttribute("value");
            }
            return "";
        });

        // get ảnh thumbnail

        if (iframe) {
            iframe = iframe.replace(/'/g, "''");
            url = url.replace(/'/g, "''");
            let updateStatusQuery = ` UPDATE crawler_map SET link_google_map = '${url}' ,iframe_map = '${iframe}' , thumbnail = '${thumbnailSrc}' , is_crawler_iframe_map = 1, is_convert = 1 WHERE id=${crawler_id}`;
            await database.execute(updateStatusQuery);
            console.error("Success iframe");
            await page.close();
        } else {
            console.log("Iframe not found.");
            if (retry > 0) {
                console.warn(
                    `Warning: No title found, retrying... (Retry count: ${retry})`
                );
                await page.close();
                return await crawlerGoogleIframe(browser, record, retry - 1);
            }
        }
        return;
    } catch (error) {
        await page.close();
        console.error("Error crawling " + url, error);
        return false;
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

const bearerToken =
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJpc3MiOiJMYXJhdmVsIiwiaWF0IjoxNzMwOTk3NDc1LCJleHAiOjE3NjI1MzM0NzV9.DgUAoo-WfTOheMOZo7yU8LMARuPnzMFZsI7GibCr_mOeEqhKbu5Nhlr3VXNjzJ9MD5W0TJK1vc4WdePqCOGFqwusJGvNze9JTQT8U7WIU3nyBpifsDr0Q3fEfIHuAbhFiCG_MWve5USrk5uq8aDY21BCpoogqMT4j09k_vAU7KM";

async function getAllCrawlerDataBase(offset = 0) {
    const query = ` SELECT * FROM crawler_map WHERE is_crawler_iframe_map=0 ORDER BY id ASC LIMIT 500 offset ${offset}`;
    return database.query(query);
}

(async () => {
    var list_data = await getAllCrawlerDataBase();
    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=fr-FR"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });

    // let mail_login = config_mails[Math.floor(Math.random() * config_mails.length)];

    // const page = await browser.newPage();
    // await page.setViewport({ width: 1900, height: 1200 });

    // // // // Điều hướng đến trang đăng nhập Google
    // await page.goto("https://accounts.google.com/signin");

    // // Điền email
    // await page.waitForSelector('input[type="email"]');
    // await page.type('input[type="email"]', mail_login.email);
    // await page.keyboard.press("Enter");
    // await page.waitForTimeout(WAIT_TIME_SHORTLONG);
    // // Chờ mật khẩu
    // await page.waitForSelector('input[type="password"]', { visible: true });
    // await page.type('input[type="password"]', mail_login.password);
    // await page.keyboard.press("Enter");
    // // Chờ đăng nhập thành công
    // await page.waitForNavigation();

    for (let index = 0; index < list_data.length; index++) {
        let element = list_data[index];
        if (element.link_google_map && element.link_google_map.length > 0) {
            await crawlerGoogleIframe(browser, element);
            console.log("\nCrawler_success: " + element.id);
        } else {
            if (element.address && element.address.length > 0) {
                let str = element.address
                    .replace("Adresse : ", "")
                    .trim()
                    .replaceAll("  ", " ")
                    .replaceAll(" ", "+");
                element.link_google_map = `https://www.google.com/maps/place/${str}/`;
                await crawlerGoogleIframe(browser, element);
                console.log("\nCrawler_success: " + element.id);
            }
        }
    }
    await browser.close();
    console.log("Done All");
})();
