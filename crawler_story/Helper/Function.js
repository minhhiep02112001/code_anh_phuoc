const axios = require("axios");
const fs = require("fs");
const https = require("https");
function downloadImage(file, url, retryCount = 3) {
    let localFile = fs.createWriteStream(file);

    https.get(url, function (response) {
        var len = parseInt(response.headers["content-length"], 10);
        var cur = 0;
        var total = len / 1048576; //1048576 - bytes in 1 Megabyte

        response.on("data", function (chunk) {
            cur += chunk.length;
        });

        response.on("end", function () {
            localFile.close(); // Đảm bảo file được đóng lại trước khi kiểm tra
            fs.stat(file, (err, stats) => {
                if (err) {
                    console.log("Error checking file:", err);
                } else if (stats.size === 0 && retryCount > 0) { // Kiểm tra nếu file rỗng
                    console.log("Download failed, retrying...");
                    downloadImage(file, url, retryCount - 1); // Thử tải lại
                } 
            });
        });

        response.pipe(localFile);
    }).on("error", function (err) {
        console.log("Error downloading file:", err.message);
        if (retryCount > 0) {
            console.log("Retrying download...");
            downloadImage(file, url, retryCount - 1); // Thử tải lại
        }
    });
}

function convertFormData(myObject = {}, files = []) {
    var form = new FormData();

    Object.entries(myObject).forEach(([key, value]) => {
        form.append(key, value);
    });

    if (files.length > 0) {
        var index = 1;

        for (let file of files) {
            if (fs.existsSync(file)) {
                let fileStream = fs.createReadStream(file);
                // Pass file stream directly to form
                form.append("file_" + index, fileStream, file);
            }
            index++;
        }
    }
    return form;
}

function sleep(ms) {
    return new Promise((resolve) => {
        setTimeout(resolve, ms);
    });
}

async function saveImageFromUrl(url, directory, fileName) {
    try {
        // Sử dụng Axios để tải hình ảnh từ URL
        const response = await axios.get(url, { responseType: "arraybuffer" });

        // Tạo thư mục nếu chưa tồn tại
        if (!fs.existsSync(directory)) {
            fs.mkdirSync(directory);
        }

        // Lưu hình ảnh xuống thư mục đã tạo
        fs.writeFileSync(`${directory}/${fileName}`, response.data);

        return `${directory}/${fileName}`;
    } catch (error) {
        return "";
    }
}

// Gọi hàm để tải hình ảnh và lưu xuống hệ thống tệp
//   saveImageFromUrl(imageUrl, downloadDirectory, fileName);

 
function convertToSlug(text) {
    return text
      .toLowerCase() // Chuyển tất cả chữ cái thành chữ thường
      .normalize('NFD') 
      .replace(/[\u0300-\u036f]/g, '') // Loại bỏ dấu (diacritical marks)
      .replace(/[^\w\s-]/g, '') // Loại bỏ ký tự đặc biệt (chỉ giữ chữ, số, dấu cách và gạch ngang)
      .replace(/\s+/g, '-') // Thay thế khoảng trắng bằng dấu gạch ngang
      .replace(/^-+|-+$/g, ''); // Loại bỏ dấu gạch ngang ở đầu và cuối chuỗi
  }

async function crawler_chapter(url_chapter, story, browser, data = null) {
    var page = await browser.newPage();
    var regex = /\d+/g;
    let matches = url_chapter.match(regex);
    let chap = matches.pop();
    let story_id = story.id;

    // let save_path =
    //     `${folder}/1stmanhwa/chap/${story.slug}-chapter-${chap}`.replace(
    //         "//",
    //         "/"
    //     );
    // let url_path =
    //     `${folder_path}/1stmanhwa/chap/${story.slug}-chapter-${chap}`.replace(
    //         "//",
    //         "/"
    //     );

    try {
        await page.goto(url_chapter);
        let content_html = "";
        let content = await page.content();
        var $ = cheerio.load(content);
        let length = $(".site-content").find(".page-break").length;
        await Helper.sleep(5000);
        var readingContentElements = await page.$$(".site-content");
        for (let readingContentElement of readingContentElements) {
            let pageBreakElements = await readingContentElement.$$(
                ".page-break"
            );

            if (pageBreakElements.length > 0) {
                // Do something with the page-break elements, for example, take a screenshot
                for (let i = 0; i < pageBreakElements.length; i++) {
                    let path = `${data.save_path}-${i}.jpg`;
                    let pageBreakElement = pageBreakElements[i];
                    await pageBreakElement.click();
                    await pageBreakElement.evaluate((element) => {
                        element.scrollIntoView({
                            behavior: "auto",
                            block: "center",
                        });
                    });
                    await Helper.sleep(1000);
                    await pageBreakElement.screenshot({ path });
                    let thumbnail = `${data.url_path}-${i}.jpg`;
                    content_html += `<div class="page-break"><img id="image-${
                        i + 1
                    }" src="${thumbnail}"></div>`;
                }
            }
        }

        var obj = {
            title: "Chapter " + chap,
            story_id: story_id,
            chapter: chap,
            crawler_href: url_chapter,
            content: content_html,
        };
        let now = moment().tz("Asia/Ho_Chi_Minh");
        let formattedDateTime = now.format("YYYY-MM-DD HH:mm:ss");

        await database.handle_chapter(obj);
        await database.execute(
            `Update st_story set updated_at = '${formattedDateTime}'  where id = ${story.id}`
        );

        console.log(
            `\n Download Success ! Story: ${story.slug}-${story_id} - chapter ${chap}`
        );
    } catch (err) {
        console.log(err);
        console.log(
            `\n Download Success ! Story: ${story.slug}-${story_id} - chapter ${chap}`
        );
        await page.close();
        return false;
    }
    await page.close();
    return true;
}

module.exports = {
    convertFormData,
    sleep,
    saveImageFromUrl,
    downloadImage,
    convertToSlug,
};
