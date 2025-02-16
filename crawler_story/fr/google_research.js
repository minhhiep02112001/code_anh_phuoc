const Helper = require("../Helper/Function");
const cheerio = require("cheerio");
const database = require("./database");
const puppeteer = require("puppeteer-extra");
const StealthPlugin = require("puppeteer-extra-plugin-stealth");
const FormData = require("form-data");
const folder = "../public/storage/";
const folder_path = "/storage/photos/restaurants";
const fs = require("fs");
const axios = require("axios");
const path = require("path");

puppeteer.use(StealthPlugin());

const config_mails = [
    { email: "co.bbidella54@gmail.com", password: "Kingseo127@123#" },
    // { email: "lancas.terjaney53@gmail.com", password: "wFWvdSQWCDA" },
    // { email: "gotoiceland9@gmail.com", password: "GY2BJyixydbeU61" },
];

const bearerToken =
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJodHRwczovL2xhb3NpYW0uc2l0ZS8iLCJhdWQiOiJsYW9zaWFtLnNpdGUvIiwiaWF0IjoxNzM1MjMwMTU4LCJleHAiOjE3NjY3NjYxNTgsImRhdGEiOnsidXNlcklkIjoxMjMsImVtYWlsIjoiYWRtaW5AZXhhbXBsZS5jb20ifX0.nWuDWcPXxUErF-xKNYsf2MiGC7n9HQjdV-6kEO6-Uw2gkhNSK6Zp3KlOlPuQHqRv61QYY9_nHMSwYf_1raLZbnSEzMu1ptuVU_Ce42LvIOEPO0O9sXARJ7-zWbsAqyHICPHj2CbFw6bV5xOik58vWpU01U8ChE-Uz3HRmbvqlePTSBHyZYuXOICTmox8X76irXdrJqy-A2B2JUfzOYMkfuN6OMKdOnLL8sd3ImfGM7_l7JdxOCBZNW6rY-Ff415ANO2pbMFrElqqfvmxgLkR26zmxPnZzv1iTfDIbZFHTw5XgSDaZQjN3pYdb5pj2NExs5m4kWVsM2EIiBltayVFCp0fusPwpCxS3mCDaG3zwOFs9W9-VDsL0suO9J0tsUWIeH-bDx0ny0_Eyz2DHrb3XFIYsjSOUE92Eg4NUm-TwWsz3z9_eLZ-awBuxsJJbbUY71N_0-jW6suTIVnhKNXZu5iw-5vLgV7y-u2iwe3xKDzasp7E89nsaDMIr013bP4jWsCOpVaakfW1_DB-7sY-VRdJp2SSAIbdLAFGHIbMSC2p8Fg_32G6HpFp-6GlzEA4rk0yXYMnHPobJlA1a92WIQe40zfg0VneEDNlgWtAMQ5DdBqYTGRF2Jays05FDVeXMA4YVqhRlag4JdO5hpA9_Kemy2ZyD6V_HgMKZ1GzX9U";

const WAIT_TIME_SHORT = 1000;
const WAIT_TIME_SHORTLONG = 5000;
const WAIT_TIME_LONG = 7000;

async function crawler_detail_search(record, browser, href = "") {
    let page = await browser.newPage();
    let id = record.id;
    try {
        await page.setExtraHTTPHeaders({
            "Accept-Language": "fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7",
        });
        // Đặt user-agent với thông tin ngôn ngữ tiếng Pháp
        await page.setUserAgent(
            "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Accept-Language: fr-FR"
        );
        if (href) {
            await page.goto(href);
        } else {
            await page.goto("https://www.google.com");

            // Chờ ô tìm kiếm xuất hiện
            await page.waitForSelector('textarea[name="q"]');

            // Nhập từ khóa và tìm kiếm

            await page.type('textarea[name="q"]', record.key_word);
            await page.keyboard.press("Enter");
            // Chờ trang kết quả tải xong
            await page.waitForNavigation();
        }

        // Chờ đợi cho nội dung tải xong
        await page.waitForTimeout(WAIT_TIME_LONG);

        var check_mutil = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 1000));

            let elements = document.querySelectorAll(
                "div[data-record-click-time]"
            );
            if (elements.length > 0) {
                elements[0].querySelector('a[role="button"][data-ved]').click();
                return true; // Đánh dấu đã click
            }
            return false; // Không tìm thấy phần tử
        });

        // lấy link google map:
        let params = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 2000));
            const elements = document.querySelectorAll(
                "div[data-local-attribute]"
            );

            let arr = [];

            let link_map = "";
            let address = "";
            let phone = "";
            let google_review = document.querySelector(
                'a[data-async-trigger="reviewDialog"][data-sort_by="qualityScore"]'
            ).textContent;

            for (let index = 0; index < elements.length; index++) {
                const element = elements[index];
                arr.push(element.innerHTML);
            }

            let index = 0;
            if (elements[index]) {
                if (elements[index].querySelector("a")) {
                    let link = elements[index]
                        .querySelector("a")
                        .getAttribute("href");
                    link_map = "https://www.google.com" + link;
                    index++;
                    if (link.startsWith("/search?")) {
                        link_map = "";
                        index = 0;
                    }
                }
            }
            if (elements[index]) {
                address = elements[index].textContent;
                index++;
            }
            if (elements[index]) {
                phone = elements[index].textContent;
            }

            return {
                link_map,
                address,
                phone,
                google_review,
                arr,
            };
        });

        // if (check_mutil && params.link_map) {
        //     console.log(params.link_map);
        //     return await crawler_detail_search(
        //         record,
        //         browser,
        //         params.link_map
        //     );
        // }

        if (params.address) {
            let link_map = params.link_map.replace(/'/g, "''");
            let address = params.address.replace(/'/g, "''");
            let phone = params.phone.replace(/'/g, "''");
            let google_review = params.google_review.replace(/'/g, "''");
            let setting = `update crawler_map set is_status=2,is_crawler=1, link_google_map='${link_map}', google_review='${google_review}' , address='${address}' , phone='${phone}' where id=${id}`;
            await database.query(setting);
            console.log("-------------------------");
            console.log("Query: " + setting);
        } else {
            await page.close();
            return;
        }

        // crawler comment:
        const buttonClicked = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 2000));
            const elements = document.querySelector(
                'a[data-async-trigger="reviewDialog"][data-sort_by="qualityScore"]'
            );
            if (elements) {
                elements.click();
                return true; // Đánh dấu đã click
            }
            return false;
        });

        if (buttonClicked) {
            let _select = `select count('id') from st_comment where crawler_id = ${record.id}`;
            let _count = await database.execute(_select);
            if (_count[0]["count('id')"] == 0) {
                await page.waitForTimeout(WAIT_TIME_SHORT);
                await page.waitForSelector('div[data-sort-id="ratingHigh"]', {
                    visible: true,
                });
                await page.click('div[data-sort-id="ratingHigh"]');
                let REVIEW_BODY_SELECTOR = ".review-dialog-body";
                let MORE_LINK_SELECTOR =
                    'a.review-more-link[aria-expanded="false"]';
                let maxScrolls = 10;

                for (let i = 0; i < maxScrolls; i++) {
                    // Cuộn phần tử `review-dialog-body`
                    await page.evaluate((selector) => {
                        const element = document.querySelector(selector);
                        if (element) {
                            element.scrollBy(0, 200); // Cuộn xuống 100px
                        }
                    }, REVIEW_BODY_SELECTOR);

                    // Đợi một chút để trang tải nội dung mới
                    await page.waitForTimeout(300);

                    // Kiểm tra nếu phần tử `review-more-link` xuất hiện
                    const foundLink = await page.evaluate((selector) => {
                        const element = document.querySelector(selector);
                        return element !== null; // Trả về `true` nếu tìm thấy
                    }, MORE_LINK_SELECTOR);

                    if (foundLink) {
                        // Click vào phần tử `review-more-link`
                        await page.click(MORE_LINK_SELECTOR);
                    }
                }

                // Lấy dữ liệu đánh giá
                let reviews = await page.evaluate(async () => {
                    await new Promise((resolve) => setTimeout(resolve, 2000)); // Đợi 2 giây để đảm bảo dữ liệu đã tải
                    const reviewElements = document.querySelectorAll(
                        "div[data-google-review-count]"
                    ); // Chọn tất cả các review

                    let links = [];
                    if (reviewElements) {
                        for (const element of reviewElements[0].querySelectorAll(
                            "div[jscontroller]"
                        )) {
                            let obj = {};
                            const first = element.querySelector(
                                'a[tabindex="-1"][ping]'
                            );

                            if (first) {
                                const img = first.querySelector("img");
                                obj.fullname = img
                                    ? img.getAttribute("alt")
                                    : null;
                                obj.src = img ? img.getAttribute("src") : null;
                            } else {
                                continue;
                            }

                            let content = element.querySelector(
                                'span[data-expandable-section][tabindex="-1"]'
                            );
                            if (
                                content > 0 &&
                                content.querySelector(
                                    "div[data-sq-below-review]"
                                ).length > 0
                            ) {
                                content
                                    .querySelector("div[data-sq-below-review]")
                                    .remove();
                            }

                            obj.content = content ? content.textContent : null;

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
            // click vào div[data-sort-id="ratingHigh"]
        }

        await page.waitForTimeout(WAIT_TIME_SHORT);
        await page.click("body");

        // crawler comment:
        const buttonClickedPhoto = await page.evaluate(async () => {
            await new Promise((resolve) => setTimeout(resolve, 2000));
            let elements = document.querySelector(
                'button[data-clid="local-photo-browser"]'
            );
            if (elements) {
                elements.click();
                return true; // Đánh dấu đã click
            }
            return false;
        });

        if (buttonClickedPhoto) {
            await page.waitForTimeout(WAIT_TIME_SHORT);

            let thumbnails = await page.evaluate(async () => {
                const images = [];
                const menus = [];
                // Cuộn nội dung nếu cần

                await new Promise((resolve) => setTimeout(resolve, 2000));
                let all = document.querySelectorAll('div[role="gridcell"]');
                if (all.length > 0) {
                    all[all.length - 1].click();
                }

                await new Promise((resolve) => setTimeout(resolve, 2000));

                let targetElement = document.querySelector("div[data-evalo]");

                await new Promise((resolve) => setTimeout(resolve, 1000));

                let elements = targetElement.querySelectorAll("img");
                for (let img of elements) {
                    const src = img?.src;
                    if (src?.startsWith("https://lh5.")) {
                        images.push(src);
                    }
                }

                let allButtons = Array.from(
                    document.querySelectorAll(
                        'scrolling-carousel[data-ved][data-hveid] div[jsaction][role="button"]'
                    )
                );
                let button = allButtons.find((button) => {
                    const fontTitleSmallElement = button.querySelector("span");
                    if (fontTitleSmallElement) {
                        const text = fontTitleSmallElement.textContent.trim();
                        // Debug: In ra text để kiểm tra
                        return (
                            text === "Menu" ||
                            text === "Matseðill" ||
                            text === "Inside"
                        );
                    }
                    return false;
                });

                if (button) {
                    button.click();
                    await new Promise((resolve) => setTimeout(resolve, 500));

                    let all = document.querySelectorAll('div[role="gridcell"]');
                    if (all.length > 0) {
                        all[all.length - 1].click();
                    }

                    let targetElement =
                        document.querySelector("div[data-evalo]");
                    if (targetElement) {
                        let totalHeight = 0; // Tổng chiều cao đã cuộn
                        const distance = 500; // Khoảng cách cuộn mỗi lần
                        const iterations = 5; // Số lần cuộn
                        const delay = 300; // Thời gian chờ giữa các lần cuộn (ms)

                        for (let i = 0; i < iterations; i++) {
                            targetElement.scrollTop += distance; // Cuộn xuống
                            totalHeight += distance; // Cập nhật chiều cao đã cuộn
                            await new Promise((resolve) =>
                                setTimeout(resolve, delay)
                            ); // Chờ
                        }
                    }
                    await new Promise((resolve) => setTimeout(resolve, 1000));

                    let elements = targetElement.querySelectorAll("img");
                    for (let img of elements) {
                        let src = img?.src;
                        if (src?.startsWith("https://lh5.")) {
                            menus.push(src);
                        }
                    }
                }

                return {
                    images,
                    menus,
                };
            });

            if (thumbnails.images.length > 0) {
                let images = thumbnails.images.map((url) => url.split("=w")[0]);
                await downloadFile(images, "photo", record);
            }
            if (thumbnails.menus.length > 0) {
                let menus = thumbnails.menus.map((url) => url.split("=w")[0]);
                await downloadFile(menus, "menu", record);
            }

            // if (thumbnails.images.length > 0 || thumbnails.menus.length > 0) {
            //     await uploadAllFilesAndFoldersInDirectory(
            //         `${folder}restaurant/${record.slug}`,
            //         `restaurants/${record.slug}`
            //     );
            // }
        }
        await page.close();
    } catch (ex) {
        console.log("Error: " + record.key_word);
        console.log(ex);
        await page.close();
        let setting = `update crawler_map set is_crawler=0 where id=${id}`;
        await database.query(setting);
    }
    return;
}

async function getAllCrawlerDataBase(offset = 0) {
    const query = ` SELECT * FROM crawler_map WHERE is_crawler = 0 ORDER BY id ASC LIMIT 500 offset ${offset}`;
    return database.query(query);
}

(async () => {
    var list_data = await getAllCrawlerDataBase();

    let mail_login =
        config_mails[Math.floor(Math.random() * config_mails.length)];

    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=fr-FR"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });

    const page = await browser.newPage();
    await page.setViewport({ width: 1900, height: 1200 });

    // // // Điều hướng đến trang đăng nhập Google
    await page.goto("https://accounts.google.com/signin");

    // Điền email
    await page.waitForSelector('input[type="email"]');
    await page.type('input[type="email"]', mail_login.email);
    await page.keyboard.press("Enter");
    await page.waitForTimeout(WAIT_TIME_SHORTLONG);
    // Chờ mật khẩu
    await page.waitForSelector('input[type="password"]', { visible: true });
    await page.type('input[type="password"]', mail_login.password);
    await page.keyboard.press("Enter");
    // Chờ đăng nhập thành công
    await page.waitForNavigation();

    for (let index = 0; index < list_data.length; index++) {
        let element = list_data[index];
        await crawler_detail_search(element, browser); // crawler link google map
    }
    await browser.close();
    console.log("Done All");
})();

async function downloadFile(results = [], _type = "photo", record) {
    let relate_thumbs = [];
    let _folder = `${folder}/restaurant/${record.slug}`;
    await fs.mkdir(_folder, { recursive: true }, (err) => {});
    //crawler_href
    results.forEach(async function (element, index) {
        let _path = `${_folder}/${record.slug}-${_type}-${index}.jpg`.replace(
            "//",
            "/"
        );
        relate_thumbs.push({
            path: `${folder_path}/${record.slug}/${record.slug}-${_type}-${index}.jpg`,
            crawler_href: element,
        });
        await Helper.downloadImage(_path, element);
    });
    await Helper.sleep(10000);
    let values = relate_thumbs.map(
        (element, index) =>
            `('${index}', '${element.path}', '${element.crawler_href}', ${record.relate_id}, '${_type}')`
    );

    let _delete = `DELETE
    FROM st_post_images
    WHERE post_id = ${record.relate_id} and type='${_type}';`;
    await database.execute(_delete);

    let _insert = `INSERT INTO st_post_images (position, thumbnail, crawler_href, post_id , type)
    VALUES ${values.join(", ")};`;
    await database.execute(_insert);
}

async function uploadAllFilesAndFoldersInDirectory(
    rootFolderPath,
    targetFolder
) {
    try {
        const files = fs.readdirSync(rootFolderPath);

        for (const file of files) {
            const filePath = path.join(rootFolderPath, file);

            if (fs.lstatSync(filePath).isFile()) {
                let formData = new FormData();
                formData.append("files[]", fs.createReadStream(filePath), file);
                formData.append("folder", targetFolder);

                await axios.post("https://resde.org/api/upload", formData, {
                    headers: {
                        ...formData.getHeaders(),
                        Authorization: `Bearer ${bearerToken}`,
                    },
                });
            }
            await Helper.sleep(500);
        }

        // for (const file of files) {
        //     let filePath = path.join(rootFolderPath, file);

        //     // Kiểm tra nếu là file
        //     if (fs.lstatSync(filePath).isFile()) {
        //         formData.append("files[]", fs.createReadStream(filePath), file); // Đính kèm file với tên
        //     }
        // }

        // // Thêm thư mục đích
        // formData.append("folder", targetFolder);
        // await axios.post("https://resde.org/api/upload", formData, {
        //     headers: {
        //         ...formData.getHeaders(),
        //         Authorization: `Bearer ${bearerToken}`,
        //     },
        // });
        // await fs.promises.rm(rootFolderPath, { recursive: true, force: true });
        console.log("Upload success folders:" + targetFolder);
    } catch (error) {
        console.error("Error uploading files and folders:", error.message);
    }
}
