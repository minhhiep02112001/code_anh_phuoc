const mysql = require("mysql2");

// Tạo kết nối đến cơ sở dữ liệu MySQL
// const connection = mysql.createConnection({
//  host: "89.117.146.40",
//   user: "deverloper",
//   password: "deverloper123@",
//   database: "restaurant_mutiple_sub",
//   port: 3306,
// });

const connection = mysql.createPool({
    connectionLimit: 100,
    host: "89.117.146.40",
    user: "deverloper",
    password: "deverloper123@",
    database: "restaurant_mutiple_sub_fi",
    port: 3306,
    waitForConnections: true,
    connectionLimit: 10,
    maxIdle: 10, // max idle connections, the default value is the same as `connectionLimit`
    idleTimeout: 30000, // idle connections timeout, in milliseconds, the default value 60000
    queueLimit: 0,
    enableKeepAlive: true,
    keepAliveInitialDelay: 0,
});

// Phương thức thực hiện truy vấn SQL SELECT
function query(sql) {
    return new Promise((resolve, reject) => {
        connection.query(sql, (error, results) => {
            if (error) {
                reject(error);
            } else {
                resolve(results);
            }
        });
    });
}

// Phương thức thực hiện truy vấn SQL INSERT, UPDATE, DELETE
function execute(sql) {
    return new Promise((resolve, reject) => {
        connection.query(sql, (error, results) => {
            if (error) {
                reject(error);
            } else {
                resolve(results);
            }
        });
    });
}

// Phương thức đóng kết nối với cơ sở dữ liệu MySQL
function closeConnection() {
    connection.end();
}

function handle_crawler_map(item) {
    return new Promise((resolve, reject) => {
        connection.query(
            `select id from crawler_map where key_word = '${item.key_word}' or slug = '${item.slug}' limit 1`,
            (error, elements) => {
                if (error) {
                    return reject(error);
                }
                if (elements.length > 0) {
                    return resolve(elements[0].id);
                } else {
                    connection.query(
                        "INSERT INTO crawler_map SET ?",
                        { ...item, is_status: 0 },
                        function (error, results) {
                            if (error) return reject(error);
                            return resolve(results.insertId);
                        }
                    );
                }
            }
        );
    });
}

function handle_post(item) {
    return new Promise((resolve, reject) => {
        connection.query(
            `select id from st_post
                           where crawler_href = '${item.crawler_href}' or slug = '${item.slug}' limit 1`,
            (error, elements) => {
                if (error) {
                    return reject(error);
                }
                if (elements.length > 0) {
                    return resolve(elements[0].id);
                } else {
                    connection.query(
                        "INSERT INTO st_post SET ?",
                        { ...item, is_status: 2 },
                        function (error, results) {
                            if (error) return reject(error);
                            return resolve(results.insertId);
                        }
                    );
                }
            }
        );
    });
}

function handle_chapter(item) {
    return new Promise((resolve, reject) => {
        connection.query(
            `select id from st_chapter where crawler_href = '${item.crawler_href}' limit 1`,
            (error, elements) => {
                if (error) {
                    return reject(error);
                }
                if (elements.length > 0) {
                    return resolve(elements[0].id);
                } else {
                    connection.query(
                        "INSERT INTO st_chapter SET ?",
                        { ...item, is_status: 2 },
                        function (error, results) {
                            if (error) return reject(error);
                            return resolve(results.insertId);
                        }
                    );
                }
            }
        );
    });
}

module.exports = {
    query,
    execute,
    handle_post,
    handle_crawler_map,
    closeConnection,
    connection,
};
