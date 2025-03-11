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
function extractInParentheses(text) {
    const match = text.match(/\(([^)]+)\)/); // Tìm chuỗi bên trong dấu ()
    return match ? match[1] : null; // Nếu tìm thấy, trả về chuỗi; nếu không, trả về null
}
function convertStr(str) {
    return str.replace(/'/g, "''");
}

async function crawlerGoogleIframe(browser, record, retry = 5) {
    let url = record.link_google_map;
    let crawler_id = record.id;
    var page = await browser.newPage();

    await page.setExtraHTTPHeaders({
        "Accept-Language": "fr-Fr,fr;q=0.9,fr-Fr;q=0.8,fr;q=0.7",
    });
    // Đặt user-agent với thông tin ngôn ngữ tiếng Pháp
    await page.setUserAgent(
        "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Accept-Language: fr-Fr"
    );

    try {
        if (!url) {
            console.error(`Error: Failed to decode URL for ${url}`);
            return;
        }
        // Điều hướng đến URL
        await page.goto(url, { waitUntil: "networkidle2", timeout: 90000 });
        await page.waitForTimeout(WAIT_TIME_SHORT);

        await simulateHumanBehavior(page);

        // Chờ đợi cho nội dung tải xong
        await page.waitForTimeout(WAIT_TIME_SHORTLONG);
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
                'button[data-tooltip="Copier le numéro de téléphone"]'
            );

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
            await new Promise((resolve) => setTimeout(resolve, 1000));
            const button = document.querySelector(
                'button[data-value="Partager"]'
            );

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
        data_update.google_review = convertStr(data_update.google_review ?? "");
        data_update.is_crawler_iframe_map = data_update.iframe_map ? 1 : 0;
        data_update.is_convert = 1;
        data_update.is_crawler = 1;
        data_update.is_error = 0;

        await database.update_crawler_map(crawler_id, data_update);
        await crawler_comment(page, record);
        await crawler_images(page, record);
        // get ảnh thumbnail
        await page.close();
        return;
    } catch (error) {
        await page.close();
        console.error("Error crawling " + url, error);
        return false;
    }
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

            if (allButtons && allButtons[1]) allButtons[1].click();
            return;
        });

        let _select = `select count('id') from st_comment where crawler_id = ${record.id}`;
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
                const maxScrolls = 5; // Số lần cuộn tối đa
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
                    'div[tabindex="-1"][lang="fr"]'
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
                            ).replace("Foto von: ", "");
                            obj.src = first
                                .querySelector("img")
                                .getAttribute("src");
                        } else {
                            continue;
                        }

                        // Lấy nội dung review
                        obj.content = element.textContent.trim();

                        // Thêm vào danh sách links
                        links.push(obj);
                    }
                }

                return links;
            });
            if (reviews.length > 0) {
                let values = reviews.slice(0, 5).map((element, index) => {
                    let newContent = element.content
                        ? element.content.replace(/'/g, "''")
                        : "";

                    let fullname = element.fullname
                        ? element.fullname.replace(/'/g, "''")
                        : "";
                    return `('${fullname}', '${newContent}', 0, '${element.src}', '${record.relate_id}', '${record.id}')`;
                });

                let _insert = `INSERT INTO st_comment (fullname, content, is_status , thumbnail, data_id, crawler_id) VALUES ${values.join(
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
async function crawler_images(page, record) {
    await page.waitForTimeout(WAIT_TIME_SHORT);
    let click = await page.evaluate(async () => {
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
        const images = [];
        // Cuộn nội dung nếu cần
        const targetElement = document.querySelector(
            'div[role="main"] div[tabindex="-1"]'
        );
        if (targetElement) {
            let totalHeight = 0;
            const distance = 500;
            let i = 0;
            while (i <= 30) {
                targetElement.scrollTop += distance;
                totalHeight += distance;
                await new Promise((resolve) => setTimeout(resolve, 300));
                i++;
            }
        }
        await new Promise((resolve) => setTimeout(resolve, 2000));

        const elements = document.querySelectorAll("a[data-photo-index]");
        for (const element of elements) {
            let img = element.querySelector("img")?.src; 
            // Nếu không có `img`, kiểm tra style attribute
            if (!img) {
                const loadedDiv = element.querySelector("div.loaded");
                await new Promise((resolve) => setTimeout(resolve, 100));
                if (loadedDiv) {
                    const styleAttr = loadedDiv.getAttribute("style") || "";
                    const match = styleAttr.match(/url\(["']?(.*?)["']?\)/);
                    if (match && match[1]) {
                        img = match[1];
                    }
                }
            }

            // Thêm URL ảnh vào mảng
            if (img && img.startsWith("https://lh5.googleusercontent.com")) {
                images.push(img);
            }
        } 
        return images;
    });

    
    if (thumbnails.length > 0) {
        await downloadFile(thumbnails, "photo", record);
    }
    console.error("Success download " +thumbnails.length);
    return;
}
async function downloadFile(results = [], _type = "photo", record) {
    //crawler_href
    await Helper.sleep(10000);
    let values = results.map((element, index) => {
        let path = `${folder_path}/${record.slug}/${record.slug}-${_type}-${index}.jpg`;
        return `('${index}', '${path}', '${element}', ${record.relate_id},${record.id}, '${_type}')`;
    });

    let _delete = `DELETE
    FROM st_post_images
    WHERE crawler_id = ${record.id} and type='${_type}';`;
    await database.execute(_delete);

    let _insert = `INSERT INTO st_post_images (position, thumbnail, crawler_href, post_id , crawler_id, type)
    VALUES ${values.join(", ")};`;
    await database.execute(_insert);
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
    const query = ` SELECT * FROM crawler_map WHERE id = 27041 ORDER BY id ASC LIMIT 500 offset ${offset}`;
    return database.query(query);
}

(async () => {
    var list_data = await getAllCrawlerDataBase();

    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=en-US"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });

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
