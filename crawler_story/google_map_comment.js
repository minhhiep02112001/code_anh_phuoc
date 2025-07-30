const puppeteer = require("puppeteer-extra");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");
puppeteer.use(StealthPlugin());
const path = require("path");
const { isArray } = require("lodash");
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

async function commentBrandIframe(page, params = {}) {
    const iframeHandle = await page.waitForSelector(
        "iframe.goog-reviews-write-widget"
    );
    const { content = "", images = [] } = params;
    try {
        // 2. Lấy nội dung bên trong iframe
        const frame = await iframeHandle.contentFrame();
        const rating = Math.random() < 0.5 ? 4 : 5;
        // 3. Chờ ngôi sao rating xuất hiện và click
        await frame.waitForSelector(`div[data-rating="${rating}"]`);
        await frame.$eval(`div[data-rating="${rating}"]`, (el) => el.click());

        // Đợi một chút để cuộn xong
        await page.waitForTimeout(configWaitSleep.shortLong);
        // 4. Optional: điền mô tả đánh giá
        await frame.type("textarea", content);
        if (isArray(images) && images.length > 0) {
            const [addPhotoBtn] = await frame.$x(
                "//span[contains(text(), 'Add photos & videos')]"
            );
            for (const element of images) {
                await uploadBrandImage(frame, addPhotoBtn, element);
                console.log("Upload image iframe ", element);
                await frame.waitForTimeout(configWaitSleep.shortLong);
            }
        }
        // Submit review bằng cách click nút "Post"
        const [buttonSubmit] = await frame.$x(
            "//span[contains(text(), 'Post')]/ancestor::button"
        );
        if (buttonSubmit) {
            await buttonSubmit.click();
            console.log("Đã nhấn Post để gửi đánh giá.");
            await page.waitForTimeout(configWaitSleep.long);
            return true;
        }
        return false;
    } catch (error) {
        console.error("Error during commenting process:", error);
        return false;
    }
}

async function uploadBrandImage(frame, addPhotoBtn, image = "") {
    if (addPhotoBtn) await addPhotoBtn.click();

    await frame.waitForTimeout(configWaitSleep.shortLong);

    await frame.waitForSelector('div[data-is-adaptive="true"] iframe', {
        visible: true,
    });
    const pickerIframeHandle = await frame.$(
        'div[data-is-adaptive="true"] iframe'
    );
    var pickerFrame = await pickerIframeHandle.contentFrame();

    await pickerFrame.waitForSelector('button[role="tab"]'); // hoặc refine bằng innerText
    const uploadTabs = await pickerFrame.$$('button[role="tab"]');
    await uploadTabs[1].click(); // Tab thứ 2 là “Upload”

    await pickerFrame.waitForTimeout(configWaitSleep.short);

    // Upload ảnh
    const filePath = path.resolve(__dirname, image);
    const inputUploadHandle = await pickerFrame.$('input[type="file"]');
    if (inputUploadHandle) {
        await inputUploadHandle.uploadFile(filePath);
        await pickerFrame.waitForTimeout(configWaitSleep.shortLong);
    }
    return;
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

        await commentBrandIframe(page, {
            content: "Đánh giá thử nghiệm từ",
            images: [
                "../public/images/beyout-banner-mb.jpg",
                "../public/images/beyout-banner-pc.jpg",
            ],
        });

        // Chờ thêm nếu cần
    } catch (error) {
        console.error("Error during map redirection:", error);
    } finally {
        console.log("\nFinally");
        return;
        //    await page.close(); // Đảm bảo đóng trang sau khi hoàn tất công việc
    }
}

async function crawlerCommentYelp(browser, record_id = 0, url = "", page = 1) {
    let start = (page - 1) * 10;
    let newPage = await browser.newPage();
    await newPage.setExtraHTTPHeaders(config.setExtraHTTPHeaders);
    await newPage.setUserAgent(config.setUserAgent);
    await newPage.goto(`${url}?start=${start}`);
    return;
}

(async () => {
    let mail_login =
        config_mails[Math.floor(Math.random() * config_mails.length)];

    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: [
            "--start-maximized",
            "--no-sandbox",
            "--disable-blink-features=AutomationControlled",
        ],
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
        await page.waitForTimeout(configWaitSleep.long);

        await page.goto("https://www.yelp.com/", { waitUntil: "networkidle2" });
        await page.waitForTimeout(3000 + Math.random() * 1000);

        await page.goto("https://www.yelp.com/biz/mumu-hot-pot-sunnyvale-2", {
            waitUntil: "domcontentloaded",
        });

        // await crawlerCommentYelp(
        //     browser,
        //     0,
        //     "https://www.yelp.com/biz/mumu-hot-pot-sunnyvale-2"
        // );
        return;

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
