const puppeteer = require("puppeteer-extra");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");
const database = require("./database");
puppeteer.use(StealthPlugin());

const arr_account_chat_gpt = [
    // {
    //     email: "vinhsynguyen127@gmail.com",
    //     password: "KingSeo127@123@#",
    // },
    {
        email: "halaboiz.ads@gmail.com",
        password: "-tP?/g8,3s3xWLb",
    },
];
var i = 0;
async function login(page) {
    let account =
        arr_account_chat_gpt[
            Math.floor(Math.random() * arr_account_chat_gpt.length)
        ];

    await page.goto("https://chat.openai.com/auth/login");
    await page.waitForTimeout(10000);
    await page.waitForSelector('button[data-testid="login-button"]', {
        timeout: 120000,
    });
    await page.click('button[data-testid="login-button"]');

    await page.waitForSelector('input[name="email"]', { timeout: 120000 });
    await page.type('input[name="email"]', account.email, {
        delay: 100,
    });

    await page.evaluate(() => {
        const continueButton = document.querySelector(".continue-btn");
        if (continueButton) {
            continueButton.removeAttribute("disabled");
        }
    });

    await page.click(".continue-btn");

    await page.waitForSelector('input[name="password"]', {
        timeout: 120000,
        visible: true,
    });

    await page.evaluate(() => {
        const passwordField = document.querySelector('input[name="password"]');
        if (passwordField) {
            passwordField.removeAttribute("disabled");
        }
    });
    await page.type('input[name="password"]', account.password, {
        delay: 100,
    });

    await page.evaluate(() => {
        const continueButton = document.querySelector('button[name="action"]');
        if (continueButton) {
            continueButton.removeAttribute("disabled");
        }
    });
    await page.waitForTimeout(2000);
    await page.waitForSelector('button[name="action"]:not([disabled])', {
        visible: true,
    });
    await page.click('button[name="action"]');

    await page.waitForNavigation({ waitUntil: "networkidle2" });
    await page.waitForTimeout(3000);
    console.log("Đăng nhập thành công.");
}

async function newChat(page) {
    await page.waitForTimeout(1000);

    // Nhấn vào nút "New Chat" để bắt đầu một cuộc trò chuyện mới
    await page.waitForSelector('button[data-testid="create-new-chat-button"]', {
        timeout: 10000,
        visible: true,
    });
    await page.click('button[data-testid="create-new-chat-button"]');
    console.log("[Click new chat]");
    // if (i == 0)
        // await page.goto(
        //     "https://chatgpt.com/g/g-yrzh91jMY-seo-content-creator"
        // );
    // i++;
    await page.waitForTimeout(2000); // Chờ một chút để ChatGPT sẵn sàng
}

async function askChatGPT(data_content, page) {
    try {
        // Kiểm tra và xử lý nút lỗi, reload lại URL và click "new chat"
        if (
            await page.$('button[data-testid="regenerate-thread-error-button"]')
        ) {
            console.log("Error button detected, reloading page...");
            await newChat(page);
        }
        // Xóa nội dung cũ trong các phần tử phù hợp
        await page.evaluate(() => {
            const responses = document.querySelectorAll(
                'div[data-message-author-role="assistant"]'
            );
            responses.forEach((response) => {
                response.remove(); // Xóa các phản hồi từ ChatGPT
            });
        });
        // Xóa nội dung cũ trong các phần tử phù hợp
        await page.evaluate(() => {
            const articles = document.querySelectorAll(
                'div[role="presentation"] article'
            );
            if (articles.length > 0) {
                articles.forEach(async (article) => {
                    await article.remove(); // Xóa toàn bộ phần tử article
                });
            }
        });

        if (!(await page.$('div[id="prompt-textarea'))) {
            await page.reload({ waitUntil: "networkidle2" });
            await newChat(page);
            return askChatGPT(data_content, page);
        }

        await page.waitForTimeout(3000); // Chờ một chút trước khi gửi
        await page.waitForSelector('div[id="prompt-textarea"]');
        await page.click('div[id="prompt-textarea"]');
        await page.waitForTimeout(1000);
        await page.evaluate((data_content) => {
            const div = document.querySelector('div[id="prompt-textarea"]');

            // Xóa tất cả nội dung hiện tại
            while (div.firstChild) {
                div.removeChild(div.firstChild);
            }

            // Tách nội dung theo dòng và thêm từng đoạn vào
            data_content.split("\n").forEach((line) => {
                const p = document.createElement("p"); // Tạo thẻ <p> cho từng dòng
                p.textContent = line; // Gán nội dung cho <p>
                div.appendChild(p); // Thêm <p> vào trong div
            });

            // Kích hoạt sự kiện input
            div.dispatchEvent(new Event("input", { bubbles: true }));
        }, data_content);

        await page.waitForTimeout(2000); // Chờ một chút trước khi gửi

        if (
            await page.$('button[data-testid="regenerate-thread-error-button"]')
        ) {
            return await askChatGPT(data_content, page);
        }

        await page.focus('div[id="prompt-textarea"]');
        await page.keyboard.press("Enter");

        // Chờ phản hồi từ ChatGPT
        await page.waitForSelector(
            'div[data-message-author-role="assistant"]',
            {
                timeout: 60000,
                visible: true,
            }
        );

        await page.waitForSelector(
            'button[data-testid="copy-turn-action-button"]',
            {
                timeout: 60000,
                visible: true,
            }
        );
        await page.waitForTimeout(15000);

        const responseHandle = await page
            .waitForFunction(
                () => {
                    const assistantNode = document.querySelector(
                        'div[data-message-author-role="assistant"]'
                    );
                    if (assistantNode) {
                        // Remove all buttons within the assistant node
                        const buttons =
                            assistantNode.querySelectorAll("button");
                        buttons.forEach((button) => button.remove());

                        const link_a =
                            assistantNode.querySelectorAll(
                                'a[target="_blank"]'
                            );
                        link_a.forEach((link_a) => link_a.remove());

                        // Extract the content from the markdown element
                        const contentElement =
                            assistantNode.querySelector(".markdown.prose");

                        if (contentElement) {
                            return contentElement.innerText;
                        }
                    }
                    return null;
                },
                { timeout: 60000 }
            )
            .catch(() => null);

        let response = "";
        if (responseHandle) {
            response = await responseHandle.jsonValue();
        } else {
            console.error("Không tìm thấy nội dung từ assistant.");
        }

        return removeExtraSpaces(response);
    } catch (e) {
        // Bạn có thể gọi lại askChatGPT với data_content và page nếu muốn
        return await askChatGPT(data_content, page);
    }
}

async function deleteAllChat(page) {
    try {
        // Mở menu tài khoản
        await page.waitForTimeout(2000);
        console.log("Mở menu tài khoản...");
        await page.waitForSelector('button[data-testid="profile-button"]', {
            visible: true,
        });
        await page.click('button[data-testid="profile-button"]');
        await page.waitForTimeout(2000);

        // Chuyển đến mục cài đặt
        console.log("Đi đến mục cài đặt...");
        await page.waitForSelector('[data-testid="settings-menu-item"]', {
            visible: true,
        });
        await page.click('[data-testid="settings-menu-item"]');
        await page.waitForTimeout(2000);

        // Nhấn nút "Xóa tất cả cuộc trò chuyện"
        console.log("Nhấn nút 'Xóa tất cả cuộc trò chuyện'...");
        await page.waitForSelector(
            'button[data-testid="delete-all-chats-button"]',
            { visible: true }
        );
        await page.click('button[data-testid="delete-all-chats-button"]');
        await page.waitForTimeout(2000);

        // Xác nhận xóa tất cả cuộc trò chuyện
        console.log("Xác nhận xóa tất cả cuộc trò chuyện...");
        await page.waitForSelector(
            'button[data-testid="confirm-delete-all-chats-button"]',
            { visible: true }
        );
        await page.click(
            'button[data-testid="confirm-delete-all-chats-button"]'
        );
        await page.waitForTimeout(2000);

        // Đóng cửa sổ
        console.log("Đóng cửa sổ cài đặt...");
        await page.waitForSelector('button[data-testid="close-button"]', {
            visible: true,
        });
        await page.click('button[data-testid="close-button"]');
        await page.waitForTimeout(2000);

        console.log("Xóa lịch sử thành công. Tải lại trang...");
        await page.reload({ waitUntil: "networkidle2" });
        console.log("Trang đã được tải lại.");
    } catch (error) {
        console.error("Lỗi khi xóa lịch sử:", error);
    }
}

function removeExtraSpaces(str) {
    return str.trim().replace(/'/g, "''");
}

function explodeString(str) {
    // Split the string by newline character
    let arr_str = str.split("\n");
    // Remove empty strings from the array
    arr_str = arr_str.filter((item) => item !== "");
    // Wrap each line in a <p> tag
    arr_str = arr_str.map((item) => `<p>${item}</p>`);
    // Join the array into a single string and return it
    return arr_str.join("");
}

async function getPost(offset = 0, limit = 100) {
    const query = `
        SELECT id, title, slug,  address , phone
        FROM st_post where  is_crawler_content=0 && is_status =3
         ORDER BY id DESC
        LIMIT ${limit} offset ${offset}`;
    return database.query(query);
}

const _content_main = `Brand: [Brand]  
Yêu cầu search các dữ liệu về Brand restaurant Germany avis để đưa ra dữ liệu Search xong hãy viết lại dựa vào yêu cầu sau, Trả về kết quả chính luôn:
 - Ngôn ngữ: tiếng Đức  
 - Yêu cầu thêm: bỏ qua các dàn ý,bỏ đường dẫn google, bỏ các từ ngữ tóm tắt, kết luận, viết có ngắt quãng, có tính đọc hơn,đáp ứng semantic Content, unique 100% , hãy đa dạng hơn về phong cách mở bài, chỉ lấy thông tin từ nguồn, đừng nhắc lại nguồn trong đoạn văn. 
 - Viết đoạn văn giới thiệu nhà hàng max 500 từ, bắt đầu 1 tiêu đề hấp dẫn như 1 lời chào đến khách hàng, viết có tính đọc, ngắt quãng, nêu món ăn nổi bật trong menu, loại ẩm thực liên quan, địa chỉ, không gian ăn uống,các tiện ích khác, sự đánh giá của khách hàng và cuối đoạn đưa ra câu mời chào đến với cửa hàng.
`;

const _content_about = `Brand: [Brand]   
Yêu cầu: search các dữ liệu về Brand restaurant Germany để đưa ra dữ liệu Search xong hãy viết lại dựa vào yêu cầu sau 
 - Ngôn ngữ: tiếng Đức 
 - Yêu cầu thêm: bỏ qua các dàn ý, tiêu đề, bỏ các từ ngữ tóm tắt,link google, kết luận, viết có ngắt quãng, có tính đọc hơn,đáp ứng semantic Content, unique 100% , hãy đa dạng hơn về phong cách mở bài.chỉ lấy thông tin từ nguồn, đừng nhắc lại nguồn trong đoạn văn
 - Viết đoạn văn chào mừng ngắn 100 từ về nhà hàng
`;

const _content_seo = `Brand: [Brand]  
Tìm kiếm thông tin về brand restaurant Germany avis để đưa ra dữ liệu duy nhất (1), Tìm kiếm xong hãy viết lại dựa vào yêu cầu sau:
- Ngôn ngữ: tiếng Đức 
- Cấu trúc: Brand - Nhà hàng tại tên đường, thành phố - 1 ẩm thực liên quan nhất | Resde
- Yêu cầu chính: Trả luôn kết quả 1 dòng tiêu đề SEO (META_TITLE) theo cấu trúc trên.
- Yêu cầu thêm: Bỏ qua các dàn ý, tiêu đề, bỏ các từ ngữ tóm tắt,link liên kết google, kết luận`;

const _content_time_open = `Brand: [Brand] 
    Yêu cầu viết cho tôi thời gian mở cửa của nhà hàng này nước pháp, trả về dạng HTML (table class 'table-restaurent-time-open'): 
    - Ngôn ngữ: tiếng Đức  
    - Yêu cầu thêm: (trả về dạng HTML) bỏ qua các dàn ý, tiêu đề, bỏ các từ ngữ tóm tắt, kết luận, viết có ngắt quãng, chỉ lấy thông tin từ nguồn, đừng nhắc lại nguồn trong đoạn văn.
    - Viết cho tôi thời gian mở dạng mã html`;

(async () => {
    while (1) {
        let listPost = await getPost(0, 300);
        const browser = await puppeteer.launch({
            headless: false,
            args: ["--start-maximized"],
            defaultViewport: null,
        });
        if (listPost.length == 0) break;
        try {
            const page = await browser.newPage();

            await login(page);

            var index = 0;

            for (const element of listPost) {
                let status = true;

                if (index > 60) {
                    await deleteAllChat(page);
                    index = 0;
                }

                await newChat(page);

                let content_seo_chat = _content_seo.replaceAll(
                    "[Brand]",
                    element.title
                );
                let content_seo = await askChatGPT(content_seo_chat, page);
                if (content_seo.length > 0) {
                    content_seo = content_seo
                        .replaceAll("Sources", "")
                        .replaceAll("\n", "")
                        .replaceAll("  ", " ");
                    await database.query(
                        `UPDATE st_post SET meta_title  = '${content_seo}' WHERE id = ${element.id}`
                    );
                    if (content_seo.includes("Got it")) status = false;
                    console.log(
                        `Success meta_title: ${content_seo} (${status})`
                    );
                }


                let content_about_chat = _content_about.replaceAll(
                    "[Brand]",
                    element.title
                );
                let content_about = await askChatGPT(content_about_chat, page);

                if (content_about.length > 0) {
                    await database.query(
                        `UPDATE st_post SET content_about  = '${content_about}' WHERE id = ${element.id}`
                    );
                    if (content_about.includes("Got it")) status = false;
                    console.log(
                        `Success content_about: ${element.title} (${status})`
                    );
                }

               
                let content_main_chat = _content_main.replaceAll(
                    "[Brand]",
                    element.title
                );
                let content = await askChatGPT(content_main_chat, page);

                if (content.length > 0) {
                    content = explodeString(content);
                    await database.query(
                        `UPDATE st_post SET content  = '${content}' WHERE id = ${element.id}`
                    );
                    if (content.includes("Got it")) status = false;
                    console.log(
                        `Success content: ${element.title} (${status})`
                    );
                }

                index++;
                let time_open = _content_time_open.replaceAll(
                    "[Brand]",
                    element.title
                );
                let content_time_open = await askChatGPT(time_open, page);

                if (content_time_open.length > 0) {
                    await database.query(
                        `UPDATE st_post SET time_open  = '${content_time_open}' WHERE id = ${element.id}`
                    );
                    console.log("Success content_time_open: " + element.title);
                }
                if (status == true) {
                    await database.query(
                        `UPDATE st_post SET is_crawler_content=1 WHERE id = ${element.id}`
                    );
                    console.log("Crawler success: " + element.title);
                } else {
                    console.log("Crawler error: " + element.title);
                }
            }
        } catch (error) {
            console.error("Lỗi: ", error);
        }
        await browser.close();
        console.log("Done All");
    }
})();
