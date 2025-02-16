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
const WAIT_TIME_LONG = 3000;

async function crawlerGoogleImages(url, post_id = 0, _slug = "", retry = 5) {
    let _folder = `${folder}/restaurant/${_slug}`;
    await fs.mkdir(_folder, { recursive: true }, (err) => {});

    var browser = await initializeBrowser();
    var page = await browser.newPage();
    await page.setViewport({
        width: 1280, // Chiều rộng (px)
        height: 720, // Chiều cao (px)
    });
    await setupPage(page);
    try {
        if (!url) {
            console.error(`Error: Failed to decode URL for ${url}`);
            return;
        }

        // Điều hướng đến URL
        await page.goto(url, { waitUntil: "networkidle2" });
        await page.waitForTimeout(WAIT_TIME_SHORT);
        // Mô phỏng hành vi con người (nếu cần)
        await simulateHumanBehavior(page);

        // Chờ đợi cho nội dung tải xong
        await page.waitForTimeout(WAIT_TIME_LONG);

        // Sử dụng Puppeteer để kiểm tra và click nếu nút tồn tại
        const buttonClicked = await page.evaluate(() => {
            // Tìm tất cả các nút
            const allButtons = Array.from(document.querySelectorAll("button"));

            // Lọc các nút có jsaction chứa ".heroHeaderImage"
            const button = allButtons.find((button) => {
                const jsaction = button.getAttribute("jsaction") || "";
                return /\.heroHeaderImage$/.test(jsaction); // Kiểm tra bằng RegEx
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
            await browser.close();
            console.log("Button not found.");
            if (retry > 0) {
                console.warn(
                    `Warning: No title found, retrying... (Retry count: ${retry})`
                );
                return await crawlerGoogleImages(
                    url,
                    post_id,
                    _slug,
                    retry - 1
                );
            }
            return;
        }
        await page.waitForTimeout(WAIT_TIME_LONG);
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
                while (i <= 15) {
                    targetElement.scrollTop += distance;
                    totalHeight += distance;
                    await new Promise((resolve) => setTimeout(resolve, 300));
                    i++;
                }
            }
            await new Promise((resolve) => setTimeout(resolve, 1000));

            const elements = document.querySelectorAll(
                "a[data-photo-index]"
                //  "button[data-carousel-index], button[data-index], a[data-photo-index]"
            );
            for (const element of elements) {
                let img = element.querySelector("img")?.src;

                // Nếu không có `img`, kiểm tra style attribute
                if (!img) {
                    const loadedDiv = element.querySelector("div.loaded");
                    if (loadedDiv) {
                        const styleAttr = loadedDiv.getAttribute("style") || "";
                        const match = styleAttr.match(/url\(["']?(.*?)["']?\)/);
                        if (match && match[1]) {
                            img = match[1];
                        }
                    }
                }

                // Thêm URL ảnh vào mảng
                if (
                    img &&
                    img.startsWith("https://lh5.googleusercontent.com")
                ) {
                    images.push(img);
                }
            }
            await new Promise((resolve) => setTimeout(resolve, 1000));

            let allButtons = Array.from(
                document.querySelectorAll('button[role="tab"]')
            );
            let button = allButtons.find((button) => {
                const fontTitleSmallElement =
                    button.querySelector(".fontTitleSmall");
                if (fontTitleSmallElement) {
                    const text = fontTitleSmallElement.textContent
                        .trim()
                        .toLowerCase();
                    console.log("Text:", text); // Debug: In ra text để kiểm tra
                    return text === "menu" || text === "inside";
                }
                return false;
            });

            if (button) {
                button.click();
                console.log("Clicked button:", button);
            } else {
                console.log('No button found with text "menu" or "inside".');
            }

            return images;
        });

        await page.waitForTimeout(WAIT_TIME_LONG);
        // get image menus
        let menus = await page.evaluate(async () => { 
            let images = []; 
            // Cuộn nội dung nếu cần
            let targetElement = document.querySelector(
                'div[role="main"] div[tabindex="-1"]'
            );
            await new Promise((resolve) => setTimeout(resolve, 3000));
            if (targetElement) {
                let totalHeight = 0;
                const distance = 300;
                let i = 0;
                while (i <= 8) {
                    targetElement.scrollTop += distance;
                    totalHeight += distance;
                    await new Promise((resolve) => setTimeout(resolve, 300));
                    i++;
                }
            }
            await new Promise((resolve) => setTimeout(resolve, 1000));

            const elements = document.querySelectorAll(
                "a[data-photo-index]" 
            );
            for (const element of elements) {
                let img = element.querySelector("img")?.src;

                // Nếu không có `img`, kiểm tra style attribute
                if (!img) {
                    const loadedDiv = element.querySelector("div.loaded");
                    if (loadedDiv) {
                        const styleAttr = loadedDiv.getAttribute("style") || "";
                        const match = styleAttr.match(/url\(["']?(.*?)["']?\)/);
                        if (match && match[1]) {
                            img = match[1];
                        }
                    }
                }

                // Thêm URL ảnh vào mảng
                if (
                    img &&
                    img.startsWith("https://lh5.")
                ) {
                    images.push(img);
                }
            } 
            return images;
        });

        let _arr_menu = menus;
        let _arr_image = [];
        let _arr_banner = [];

        if (_arr_menu.length > 6) _arr_menu = _arr_menu.slice(0, 6);

        let set2 = new Set(_arr_menu);

        thumbnails = thumbnails.filter((item) => !set2.has(item));

        let thumb = "";
        if (thumbnails.length > 0) {
            thumb = thumbnails[0];
            _arr_banner = thumbnails.slice(1, 7);
            if (thumbnails.length > 6) _arr_image = thumbnails.slice(7, 13);
        }

       
        // In danh sách URL ảnh

        if (_arr_menu.length > 0) {
            let relate_thumbs = [];
            for (let index = 0; index < _arr_menu.length; index++) {
                let element = _arr_menu[index];
                let _path = `${_folder}/menu-${_slug}-${index}.jpg`.replace(
                    "//",
                    "/"
                );
                relate_thumbs.push(
                    `${folder_path}restaurant/${_slug}/menu-${_slug}-${index}.jpg`
                );
                await Helper.downloadImage(_path, element);
            }

            let _delete = `DELETE
                 FROM st_post_images
                 WHERE post_id = ${post_id} and type='post_menu';`;
            await database.execute(_delete);
            let values = relate_thumbs.map(
                (element, index) =>
                    `('${index}', '${element}', ${post_id}, 'post_menu')`
            );
            let _insert = `INSERT INTO st_post_images (position, thumbnail, post_id , type)
                VALUES ${values.join(", ")};`;

            await database.execute(_insert);
        }

        if (_arr_banner.length > 0) {
            let relate_thumbs = [];
            for (let index = 0; index < _arr_banner.length; index++) {
                let element = _arr_banner[index];
                let _path = `${_folder}/banner-${_slug}-${index}.jpg`.replace(
                    "//",
                    "/"
                );
                relate_thumbs.push(
                    `${folder_path}restaurant/${_slug}/banner-${_slug}-${index}.jpg`
                );
                await Helper.downloadImage(_path, element);
            }

            let _delete = `DELETE
                             FROM st_post_images
                             WHERE post_id = ${post_id} and type='banner';`;
            await database.execute(_delete);
            let values = relate_thumbs.map(
                (element, index) =>
                    `('${index}', '${element}', ${post_id}, 'banner')`
            );
            let _insert = `INSERT INTO st_post_images (position, thumbnail, post_id , type)
                            VALUES ${values.join(", ")};`;

            await database.execute(_insert);
        }

        if (_arr_image.length > 0) {
            let relate_thumbs = [];
            for (let index = 0; index < _arr_image.length; index++) {
                let element = _arr_image[index];
                let _path = `${_folder}/${_slug}-${index}.jpg`.replace(
                    "//",
                    "/"
                );
                relate_thumbs.push(
                    `${folder_path}restaurant/${_slug}/${_slug}-${index}.jpg`
                );
                await Helper.downloadImage(_path, element);
            }

            let _delete = `DELETE
                             FROM st_post_images
                             WHERE post_id = ${post_id} and type='post';`;
            await database.execute(_delete);
            let values = relate_thumbs.map(
                (element, index) =>
                    `('${index}', '${element}', ${post_id}, 'post')`
            );
            let _insert = `INSERT INTO st_post_images (position, thumbnail, post_id , type)
                            VALUES ${values.join(", ")};`;

            await database.execute(_insert);
        }

        if (thumb) {
            let _path = `${_folder}/thumb-${_slug}.jpg`.replace("//", "/");
            await Helper.downloadImage(_path, thumb);
            let _thumb = `${folder_path}restaurant/${_slug}/thumb-${_slug}.jpg`;
            let updateStatusQuery = ` UPDATE st_post SET thumbnail = '${_thumb}' WHERE id=${post_id}`;
            await database.execute(updateStatusQuery);
        }
        console.error("Success");
        await page.close();
        await browser.close();
        if (thumbnails.length > 0 || menus.length > 0) return true;
        return false;
    } catch (error) {
        await page.close();
        await browser.close();
        console.error("Error crawling " + url, error);
        return false;
    }
}

async function crawlerGoogleIframe(url, post_id = 0, retry = 5) {
    var browser = await initializeBrowser();
    var page = await browser.newPage();
    await page.setViewport({
        width: 1280, // Chiều rộng (px)
        height: 720, // Chiều cao (px)
    });
    await setupPage(page);
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

        // Sử dụng Puppeteer để kiểm tra và click nếu nút tồn tại
        const buttonClicked = await page.evaluate(() => {
            // Tìm tất cả các nút
            const allButtons = Array.from(document.querySelectorAll("button"));

            // Lọc các nút có jsaction chứa ".heroHeaderImage"
            const button = allButtons.find((button) => {
                const jsaction = button.getAttribute("data-value") || "";
                return jsaction == "Chia sẻ" || jsaction == "Share"; // Kiểm tra bằng RegEx
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
            await browser.close();
            console.log("Button not found.");
            if (retry > 0) {
                console.warn(
                    `Warning: No title found, retrying... (Retry count: ${retry})`
                );
                return await crawlerGoogleIframe(url, post_id, retry - 1);
            }
            return;
        }

        await page.waitForTimeout(WAIT_TIME_SHORT);
        // get image menus
        let iframe = await page.evaluate(async () => {
            let all_tab = Array.from(
                document.querySelectorAll("button[data-tooltip]")
            );

            // Tìm phần tử có nội dung "Menu" hoặc "menu"
            const tab = all_tab.find((button) => {
                const _text = button.getAttribute("data-tooltip").trim(); // Sử dụng textContent, không phải textContent()
                return _text === "Embed a map";
            });

            // Click vào phần tử nếu tồn tại
            if (tab) {
                tab.click(); // Click vào phần tử cha bậc 2
                console.log(" Click vào phần tử cha bậc 2");
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
        await page.close();
        await browser.close();
        if (iframe) {
            let updateStatusQuery = ` UPDATE st_post SET iframe_map = '${iframe}' WHERE id=${post_id}`;
            await database.execute(updateStatusQuery);
            console.error("Success iframe");
        } else {
            console.log("Iframe not found.");
            if (retry > 0) {
                console.warn(
                    `Warning: No title found, retrying... (Retry count: ${retry})`
                );
                return await crawlerGoogleIframe(url, post_id, retry - 1);
            }
        }
        return;
    } catch (error) {
        await page.close();
        await browser.close();
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
        // headless: false,
        headless: true,
        // headless: 'new',
        args: ["--no-sandbox", "--disable-setuid-sandbox"],
    });
}

async function getData(offset = 0) {
    const query = `
      SELECT crawler.*, st_post.slug from crawler join st_post on crawler.relate_id = st_post.id
      WHERE crawler.status = 0 and crawler.relate_table='st_post' and crawler.type='product_images'
      ORDER BY crawler.id DESC 
         LIMIT 200 offset ${offset}`;
    return database.query(query);
}
const bearerToken =
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJpc3MiOiJMYXJhdmVsIiwiaWF0IjoxNzMwOTk3NDc1LCJleHAiOjE3NjI1MzM0NzV9.DgUAoo-WfTOheMOZo7yU8LMARuPnzMFZsI7GibCr_mOeEqhKbu5Nhlr3VXNjzJ9MD5W0TJK1vc4WdePqCOGFqwusJGvNze9JTQT8U7WIU3nyBpifsDr0Q3fEfIHuAbhFiCG_MWve5USrk5uq8aDY21BCpoogqMT4j09k_vAU7KM";

(async () => {
    try {
        let arrs = await getData();

        for (const element of arrs) {
            try {
                // await crawlerGoogleIframe(
                //     element.crawler_href,
                //     element.relate_id
                // );

                let _status = await crawlerGoogleImages(
                    element.crawler_href,
                    element.relate_id,
                    element.slug
                );
                if (_status) {
                    updateStatusQuery = ` UPDATE crawler SET status = 1 WHERE id=${element.id}`;
                    let _folder = `${folder}restaurant/${element.slug}`;
                    let targetFolder = `restaurant/${element.slug}`;
                    await uploadAllFilesAndFoldersInDirectory(
                        _folder,
                        targetFolder
                    );
                    await database.query(updateStatusQuery);
                } else {
                    console.error("Error in crawler_href:", element.slug);
                }
            } catch (error) {
                console.error("Error in crawler_href:", error);
            }
            console.log(`Completed processing crawler_href: ${element.slug}`);
        }
    } catch (error) {
        console.error("Error in main function:", error);
    }
    console.error("Done all");
})();

// Hàm đọc tất cả các tệp và thư mục trong một thư mục gốc và tải chúng lên API
async function uploadAllFilesAndFoldersInDirectory(
    rootFolderPath,
    targetFolder
) {
    try {
        const items = fs.readdirSync(rootFolderPath);

        for (const item of items) {
            const itemPath = path.join(rootFolderPath, item);

            // Kiểm tra nếu là thư mục
            if (fs.lstatSync(itemPath).isDirectory()) {
                const files = fs.readdirSync(itemPath);
                const formData = new FormData();

                // Append mỗi tệp trong thư mục con vào formData
                for (const file of files) {
                    const filePath = path.join(itemPath, file);
                    if (fs.lstatSync(filePath).isFile()) {
                        formData.append(
                            "files[]",
                            fs.createReadStream(filePath)
                        );
                    }
                }
                formData.append("folder", `${targetFolder}/${item}`); // Thêm tên thư mục con vào `folder`

                // Gửi tất cả các tệp trong thư mục con
                const response = await axios.post(
                    "https://goto-iceland.fun/api/upload",
                    formData,
                    {
                        headers: {
                            ...formData.getHeaders(),
                            Authorization: `Bearer ${bearerToken}`,
                        },
                    }
                );

                console.log(`Uploaded folder ${item}:`, response.data);
                return;
            } else if (fs.lstatSync(itemPath).isFile()) {
                // Nếu là một tệp
                const formData = new FormData();
                formData.append("files[]", fs.createReadStream(itemPath));
                formData.append("folder", targetFolder); // Thư mục gốc mà bạn chỉ định

                // Gửi tệp đơn lẻ
                const response = await axios.post(
                    "https://goto-iceland.fun/api/upload",
                    formData,
                    {
                        headers: {
                            ...formData.getHeaders(),
                            Authorization: `Bearer ${bearerToken}`,
                        },
                    }
                );

                console.log(`Uploaded file ${item}:`, response.data);
            }
            await Helper.sleep(500);
        }
    } catch (error) {
        console.error("Error uploading files and folders:", error);
    }
}
