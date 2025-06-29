const puppeteer = require("puppeteer-extra");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");
puppeteer.use(StealthPlugin());

const config_mails = [
    { email: "gotoiceland9@gmail.com", password: "GY2BJyixydbeU61" },
];

const config = {
    setUserAgent:
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Accept-Language: en-US",
    setExtraHTTPHeaders: {
        "Accept-Language": "en-US,en;q=0.9,en-US;q=0.8,en;q=0.7",
    },
    buttonClickComment: 'button[data-value="Write a review"]',
    buttonClickRating: 'div[data-rating="5"]',
};

const configWaitSleep = {
    short: 1000,
    shortLong: 2000,
    long: 5000,
};

async function commentBrand(page, params = {}) {
    const { content = "" } = params;

    try {
        let text = await page.evaluate(async () => {
            return document.querySelector("textarea#c2");
        });
        console.log(text);
        return;

        // Cuộn tới nút đánh giá và nhấp vào nút đánh giá
        //    await page.evaluate((buttonClickRating) => {
        //        const buttons = document.querySelectorAll(buttonClickRating);
        //        buttons.forEach((element) => {
        //            if (element) {
        //                element.scrollIntoView({
        //                    behavior: "smooth",
        //                    block: "center",
        //                });
        //                element.click();
        //            }
        //        });
        //    }, config.buttonClickRating); // Truyền config vào
        //    await page.waitForSelector('div[role="main"] div[data-rating="5"]', {
        //        timeout: 15000,
        //    });
        //    await page.$eval('div[role="main"] div[data-rating="5"]', (el) =>
        //        el.click()
        //    );

        // Đợi một chút để trang tải các yếu tố
        await page.waitForTimeout(configWaitSleep.shortLong);

        await page.waitForSelector("textarea#c2");
        await page.type("textarea#c2", content);

        console.log("INput success:");
        // Đợi thêm một chút để nội dung được nhập vào
        await page.waitForTimeout(configWaitSleep.short);
    } catch (error) {
        console.error("Error during commenting process:", error);
    }
}

async function redirectMap(record = {}, page, href = "") {
    //     let page = await browser.newPage();
    try {
        await page.setExtraHTTPHeaders(config.setExtraHTTPHeaders);
        await page.setUserAgent(config.setUserAgent);

        if (!href) throw new Error("\nUrl null");
        await page.goto(href, { waitUntil: "networkidle0" }); // Chờ cho trang tải xong (network idle)

        // Đợi nút xuất hiện trên trang
        await page.waitForSelector(config.buttonClickComment, {
            timeout: 15000,
        });

        // Cuộn tới nút, truyền config vào evaluate
        await page.evaluate((buttonClickComment) => {
            const button = document.querySelector(buttonClickComment);
            if (button) {
                button.scrollIntoView({ behavior: "smooth", block: "center" });
            }
        }, config.buttonClickComment); // Truyền config vào

        // Đợi một chút để cuộn xong
        await page.waitForTimeout(configWaitSleep.shortLong);

        // Nhấn vào nút đánh giá
        await page.click(config.buttonClickComment);
        await page.waitForTimeout(configWaitSleep.shortLong);
        await page.waitForTimeout(configWaitSleep.long);

        // 1. Đợi iframe xuất hiện
        const iframeHandle = await page.waitForSelector(
            "iframe.goog-reviews-write-widget"
        );

        // 2. Lấy nội dung bên trong iframe
        const frame = await iframeHandle.contentFrame();

        const rating = Math.random() < 0.5 ? 4 : 5;

        // 3. Chờ ngôi sao rating xuất hiện và click
        await frame.waitForSelector(`div[data-rating="${rating}"]`);
        await frame.$eval(`div[data-rating="${rating}"]`, (el) => el.click());

        // 4. Optional: điền mô tả đánh giá
        await frame.type("textarea", "Đánh giá thử nghiệm từ");

        
        console.log(text);

        // Chờ thêm nếu cần
    } catch (error) {
        console.error("Error during map redirection:", error);
    } finally {
        console.log("\nFinally");
        return;
        //    await page.close(); // Đảm bảo đóng trang sau khi hoàn tất công việc
    }
}

(async () => {
    let mail_login =
        config_mails[Math.floor(Math.random() * config_mails.length)];

    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=en-US"], // Mở trình duyệt ở chế độ toàn màn hình với lang=en-US
        defaultViewport: null, // Tắt viewport mặc định
    });

    const page = await browser.newPage();
    await page.setExtraHTTPHeaders(config.setExtraHTTPHeaders);
    await page.setUserAgent(config.setUserAgent);
    await page.goto("https://accounts.google.com/signin");

    try {
        // Điền email
        await page.waitForSelector('input[type="email"]');
        await page.type('input[type="email"]', mail_login.email);
        await page.keyboard.press("Enter");
        await page.waitForTimeout(configWaitSleep.shortLong);

        // Chờ mật khẩu
        await page.waitForSelector('input[type="password"]', { visible: true });
        await page.type('input[type="password"]', mail_login.password);
        await page.keyboard.press("Enter");

        // Chờ đăng nhập thành công
        await page.waitForNavigation();

        // Chuyển hướng đến Google Maps và thực hiện các thao tác
        await redirectMap(
            {},
            page,
            "https://www.google.com/maps/place/Mumu+Hot+Pot/@37.4065395,-121.9990971,17z/data=!3m1!4b1!4m6!3m5!1s0x808fb7d446054c93:0x96aa434451a80470!8m2!3d37.4065353!4d-121.9965222!16s%2Fg%2F11hcjwxlq2?entry=ttu&g_ep=EgoyMDI1MDYyNi4wIKXMDSoASAFQAw%3D%3D&hl=en"
        );
    } catch (error) {
        console.error("Error during login or page navigation:", error);
    }
})();
