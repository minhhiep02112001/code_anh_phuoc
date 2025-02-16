const Helper = require("./Helper/Function");
const database = require("./Helper/database");
const cheerio = require("cheerio");

const puppeteer = require("puppeteer-extra");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");

puppeteer.use(StealthPlugin());

async function login(page) {
    await page.goto("https://chat.openai.com/auth/login");
    await page.waitForTimeout(3000);
    await page.waitForSelector('button[data-testid="login-button"]');
    await page.click('button[data-testid="login-button"]');

    await page.waitForSelector('input[name="email"]');
    await page.type('input[name="email"]', "halaboiz.ads@gmail.com", {
        delay: 100,
    });

    await page.evaluate(() => {
        const continueButton = document.querySelector(".continue-btn");
        if (continueButton) {
            continueButton.removeAttribute("disabled");
        }
    });

    await page.waitForTimeout(1000);
    await page.click(".continue-btn");

    await page.waitForSelector('input[name="password"]', { visible: true });

    await page.evaluate(() => {
        const passwordField = document.querySelector('input[name="password"]');
        if (passwordField) {
            passwordField.removeAttribute("disabled");
        }
    });
    await page.type('input[name="password"]', "-tP?/g8,3s3xWLb", {
        delay: 100,
    });

    await page.evaluate(() => {
        const continueButton = document.querySelector('button[name="action"]');
        if (continueButton) {
            continueButton.removeAttribute("disabled");
        }
    });
    await page.waitForTimeout(1000);
    await page.waitForSelector('button[name="action"]:not([disabled])', {
        visible: true,
    });
    await page.click('button[name="action"]');

    await page.waitForNavigation({ waitUntil: "networkidle2" });
    console.log("Đăng nhập thành công.");
}



async function askChatGPT(data_content, page) {
    await newChat(page); // Tạo cuộc trò chuyện mới trước mỗi lần gửi câu hỏi

    await page.waitForSelector('div[id="prompt-textarea"]');
    await page.evaluate((data_content) => {
        navigator.clipboard.writeText(data_content);
    }, data_content);

    await page.waitForTimeout(5000);
    await page.focus('div[id="prompt-textarea"]');
    await page.evaluate((data_content) => {
        const textarea = document.querySelector('div[id="prompt-textarea"]');
        textarea.innerText = data_content;
        textarea.dispatchEvent(new Event("input", { bubbles: true }));
    }, data_content);

    await page.waitForTimeout(5000);
    await page.keyboard.press("Enter");

    await page.waitForTimeout(60000);
    await page.waitForSelector('div[data-message-author-role="assistant"]');

    const responseHandle = await page
        .waitForFunction(
            () => {
                const targetNode = document.querySelector(
                    'div[data-message-author-role="assistant"]'
                );
                if (targetNode) {
                    const contentElement =
                        targetNode.querySelector(".markdown.prose");
                    if (contentElement) {
                        return contentElement.innerText;
                    }
                }
                return null;
            },
            { timeout: 60000 * 10 }
        )
        .catch(() => null);

    let response = "";
    if (responseHandle) {
        response = await responseHandle.jsonValue();
    } else {
        console.error("Không tìm thấy nội dung từ assistant.");
    }

    return response;
}

async function getPost(offset = 0, limit = 10) {
    const query = `
        SELECT id, title, slug, crawler_href, location , phone
        FROM st_post where is_status = 1 and content_footer is null and 
        crawler_href like 'https://restaurantguru.com/%' LIMIT ${limit} offset ${offset}`;
    return database.query(query);
}

function removeExtraSpaces(str) {
    return str.trim().replace(/\s+/g, " ");
}
const _string = ` 
Écrivez-moi un paragraphe sur le restaurant [Tên nhà hàng]
Adresse : [Địa chỉ]
Hotline : [số điện thoại] pour faire une réservation ou appeler le restaurant
Exigences :
Longueur : environ 80 mots
Fournissez des informations précises sur le restaurant
Soyez convivial pour le NLP de Google
Ayez un contexte pertinent
100 % non dupliqué avec les données existantes
 `;
(async () => {
    const browser = await puppeteer.launch({
        headless: false,
        args: ["--start-maximized"],
        defaultViewport: null,
    });
    const page = await browser.newPage();
    await page.setViewport({ width: 1900, height: 1200 });

    // Đăng nhập một lần duy nhất
    await login(page);

    while (true) {
        try {
            let posts = await getPost();
            if (posts.length == 0) break;

            for (let item of posts) {
                let _title = removeExtraSpaces(item.title);
                let _address = removeExtraSpaces(item.location);
                let _phone = removeExtraSpaces(item.phone);

                let string = _string;

                let _content = string.replace("[Tên nhà hàng]", _title);
                _content = _content.replace("[Địa chỉ]", _address);
                _content = _content.replace("[số điện thoại]", _phone);

                let content = await askChatGPT(_content, page);
                content = content.trim();
                
                if (content.length > 0) {
                    newContent = content.replace(/'/g, "''");
                    const updateQuery = `UPDATE st_post
                    SET content_footer  = '${newContent}',  updated_at = NOW()
                    WHERE id = ${item.id}`;
                    await database.query(updateQuery);
                    console.log("Success: " + item.title);
                }
            }
        } catch (error) {
            console.error("Error in main function:", error);
        }
    }

    await browser.close();
    console.log("Done All");
})();

function extractValidHtmlTags(html) {
    const regex = /<([a-zA-Z0-9]+)([^>]*)>(.*?)<\/\1>/g;
    const validTags = [];
    let match;

    while ((match = regex.exec(html)) !== null) {
        validTags.push(match[0]);
    }

    return validTags;
}
