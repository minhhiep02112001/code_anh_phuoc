const puppeteer = require("puppeteer-extra");
const stealth = require("puppeteer-extra-plugin-stealth");

puppeteer.use(stealth());

(async () => {
    const browser = await puppeteer.launch({ headless: false });
    const page = await browser.newPage();

    await page.goto("https://www.google.com/search?q=Playwright+Web+Scraping");
    return;
    await page.waitForSelector('textarea[name="q"]');
    await page.type('textarea[name="q"]', "Playwright Web Scraping");
    await page.keyboard.press("Enter");

    await page.waitForSelector("#search");
    const results = await page.$$eval("h3", (elements) =>
        elements.map((el) => el.textContent)
    );
    return;
    console.log(results);
    await browser.close();
})();
