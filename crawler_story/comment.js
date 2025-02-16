const puppeteer = require("puppeteer-extra");
const randomUseragent = require("random-useragent");
const Helper = require("./Helper/Function");
const folder = "../public/storage/";
const folder_path = "/storage/";
const fs = require("fs");
const axios = require("axios");
const path = require("path");
const xlsx = require("xlsx");
const FormData = require("form-data");
const WAIT_TIME_SHORT = 1000;
const WAIT_TIME_LONG = 3000;

async function crawlerGoogleImages(url, post_id = 0, _slug = "", retry = 5) {
    // let _folder = `${folder}/restaurant/${_slug}`;
    // await fs.mkdir(_folder, { recursive: true }, (err) => {});

    var browser = await initializeBrowser();
    var page = await browser.newPage();
    await setupPage(page);
    try {
        if (!url) {
            console.error(`Error: Failed to decode URL for ${url}`);
            return;
        }
        console.error(`Run: Failed to decode URL for ${url}`);
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
        }

        await page.waitForTimeout(WAIT_TIME_LONG);
        let datas = await page.evaluate(async () => {
            const restaurants = [];
            await new Promise((resolve) => setTimeout(resolve, 1000));
            // Cuộn nội dung nếu cần
            var targetElement = document.querySelector(
                'div[role="main"] div[tabindex="-1"] '
            );
            if (targetElement.querySelector('div[role="feed"]')) {
                targetElement = targetElement.querySelector('div[role="feed"]');
            }
            if (targetElement) {
                let totalHeight = 0;
                const distance = 500;
                let i = 0;
                while (i <= 100) {
                    targetElement.scrollTop += distance;
                    totalHeight += distance;
                    await new Promise((resolve) => setTimeout(resolve, 500));
                    i++;
                }
            }
            await new Promise((resolve) => setTimeout(resolve, 1000));

            const elements = targetElement.querySelectorAll(
                ".fontBodyMedium .fontHeadlineSmall"
            );
            for (const element of elements) {
                let obj = {};
                // let headlineElements = element.querySelectorAll(".fontHeadlineSmall");
                obj.title = element.textContent;
                let _parent = element.closest(".fontBodyMedium");
                obj.view = _parent.querySelector(".fontBodyMedium").textContent;
                let _parentE = element.closest("div[jsaction]");
                let a = _parentE.querySelector('a[target="_blank"]');
                if (a) {
                    obj.website = a.getAttribute("href");
                }

                restaurants.push(obj);
            }
            return restaurants;
        });
        const timestamp = Date.now();
        // Đường dẫn file trong thư mục public
        const publicFolder = path.join(__dirname, "public/files");
        const excelFileName = path.join(
            publicFolder,
            "restaurants" + timestamp + ".xlsx"
        );

        // Kiểm tra thư mục public, tạo nếu chưa tồn tại
        if (!fs.existsSync(publicFolder)) {
            fs.mkdirSync(publicFolder, { recursive: true });
            console.log("Thư mục public đã được tạo.");
        }

        // Tạo workbook và worksheet
        const workbook = xlsx.utils.book_new(); // Tạo một workbook mới
        const worksheet = xlsx.utils.json_to_sheet(datas); // Chuyển dữ liệu JSON thành worksheet

        // Thêm worksheet vào workbook
        xlsx.utils.book_append_sheet(workbook, worksheet, "Restaurants");

        // Ghi file Excel
        xlsx.writeFile(workbook, excelFileName);

        console.log(`Dữ liệu đã được ghi vào file ${excelFileName}`);

        console.log("data", datas);

        return;
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

            const elements = document.querySelectorAll("a[data-photo-index]");
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
                if (img && img.startsWith("https://lh5.")) {
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
        headless: false,
        args: ["--start-maximized", "--lang=en-US"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });
}

async function searchData(keyword, browser) {
    const page = await browser.newPage();
    // // // Điều hướng đến trang đăng nhập Google
    await page.goto("https://www.google.com/maps");

    await page.waitForSelector('input[id="searchboxinput"]', {
        timeout: 120000,
    });

    await page.click('input[id="searchboxinput"]');

    await page.waitForSelector('input[id="searchboxinput"]');
    await page.type('input[id="searchboxinput"]', keyword, {
        delay: 100,
    });
    await page.keyboard.press("Enter");

    await page.waitForTimeout(WAIT_TIME_LONG);
    let datas = await page.evaluate(async () => {
        const restaurants = [];
        await new Promise((resolve) => setTimeout(resolve, 1000));
        // Cuộn nội dung nếu cần
        var targetElement = document.querySelector(
            'div[role="main"] div[tabindex="-1"] '
        );
        if (targetElement.querySelector('div[role="feed"]')) {
            targetElement = targetElement.querySelector('div[role="feed"]');
        }
        if (targetElement) {
            let totalHeight = 0;
            const distance = 800;
            let i = 0;
            while (i <= 150) {
                targetElement.scrollTop += distance;
                totalHeight += distance;
                await new Promise((resolve) => setTimeout(resolve, 500));
                i++;
            }
        }
        await new Promise((resolve) => setTimeout(resolve, 1000));

        const elements = targetElement.querySelectorAll(
            ".fontBodyMedium .fontHeadlineSmall"
        );
        for (const element of elements) {
            let obj = {};
            // let headlineElements = element.querySelectorAll(".fontHeadlineSmall");
            obj.title = element.textContent;
            let _parent = element.closest(".fontBodyMedium");
            obj.view = _parent.querySelector(".fontBodyMedium").textContent;
            let _parentE = element.closest("div[jsaction]");
            let a = _parentE.querySelector('a[target="_blank"]');
            if (a) {
                obj.website = a.getAttribute("href");
            }

            restaurants.push(obj);
        }
        return restaurants;
    });
   
    const timestamp = Date.now();
    // Đường dẫn file trong thư mục public
    const publicFolder = path.join(__dirname, "public/files");
    const excelFileName = path.join(
        publicFolder,
        "restaurants" + timestamp + ".xlsx"
    );

    // Kiểm tra thư mục public, tạo nếu chưa tồn tại
    if (!fs.existsSync(publicFolder)) {
        fs.mkdirSync(publicFolder, { recursive: true });
        console.log("Thư mục public đã được tạo.");
    }

    // Tạo workbook và worksheet
    const workbook = xlsx.utils.book_new(); // Tạo một workbook mới
    const worksheet = xlsx.utils.json_to_sheet(datas); // Chuyển dữ liệu JSON thành worksheet

    // Thêm worksheet vào workbook
    xlsx.utils.book_append_sheet(workbook, worksheet, "Restaurants");

    // Ghi file Excel
    xlsx.writeFile(workbook, excelFileName);

    console.log(`Dữ liệu đã được ghi vào file ${excelFileName}`);
}

const bearerToken =
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ1c2VyX2lkIjoxLCJpc3MiOiJMYXJhdmVsIiwiaWF0IjoxNzMwOTk3NDc1LCJleHAiOjE3NjI1MzM0NzV9.DgUAoo-WfTOheMOZo7yU8LMARuPnzMFZsI7GibCr_mOeEqhKbu5Nhlr3VXNjzJ9MD5W0TJK1vc4WdePqCOGFqwusJGvNze9JTQT8U7WIU3nyBpifsDr0Q3fEfIHuAbhFiCG_MWve5USrk5uq8aDY21BCpoogqMT4j09k_vAU7KM";

(async () => {
    // let url =
    //    "https://www.google.com/maps";
    // //    "https://www.google.com/maps/search/restaurants+in+Riverview+Terrace,+new+york";

    // await crawlerGoogleImages(url, "", "");

    const browser = await puppeteer.launch({
        headless: false, // Hiển thị trình duyệt
        args: ["--start-maximized", "--lang=fr-FR"], // Mở trình duyệt ở chế độ toàn màn hình
        defaultViewport: null, // Tắt viewport mặc định
    });

    for (let index = 0; index < 20; index++) {
        await searchData("restaurants in Riverview Terrace, new york", browser);
    }

    return;
})();
