const Helper = require("./Helper/Function");
const database = require("./Helper/database");
const cheerio = require("cheerio");

const puppeteer = require("puppeteer-extra");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");

puppeteer.use(StealthPlugin());

async function login(page) {
    await page.goto("https://chat.openai.com/auth/login");

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

async function newChat(page) {
    // Nhấn vào nút "New Chat" để bắt đầu một cuộc trò chuyện mới
    await page.waitForSelector('button[aria-label="New chat"]');
    await page.click('button[aria-label="New chat"]');
    await page.waitForTimeout(2000); // Chờ một chút để ChatGPT sẵn sàng
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

    await page.waitForTimeout(10000);
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
            { timeout: 15000 * 3 }
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

async function getPost(offset = 0, limit = 1000) {
    const query = `
        SELECT * 
        FROM st_comment where st_comment.is_content = 0 and st_comment.type = 'post' LIMIT ${limit} offset ${offset}`;
    return database.query(query);
}

function removeExtraSpaces(str) {
    return str.trim().replace(/\s+/g, " ");
}
function removeTranslationPrefix(text) {
    const translationPattern = /translation.*?[:.]/i; // Tìm "translation" từ đầu đến dấu : hoặc .
    return text.replace(translationPattern, "").trim(); // Xóa phần phù hợp và loại bỏ khoảng trắng thừa
}
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
                let _content = `Translated into Icelandic: "${item.content}"`;
                let content = await askChatGPT(_content, page);
                content = content.trim();

                if (content.length > 0) {
                    let newContent = content.replace(/'/g, "''");
                    newContent = removeTranslationPrefix(newContent); 
                    newContent = newContent.trim();
                    newContent = newContent.replace(/Here’s the/g, "");
                    newContent = newContent.replace(/Here is the /g, ""); 
                    newContent = newContent.replace(/^['"]|['"]$/g, ''); // Loại bỏ ' hoặc " chỉ ở đầu và cuối

                    const updateQuery = `UPDATE st_comment
                    SET is_content = 1 , content  = '${newContent}',  updated_at = NOW()
                    WHERE id = ${item.id}`;
                    await database.query(updateQuery);
                    console.log("Success: " + item.id);
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
