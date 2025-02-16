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
    database: "restaurant_mutiple_sub",
    port: 3306,
    waitForConnections: true,
    connectionLimit: 10,
    maxIdle: 10, // max idle connections, the default value is the same as `connectionLimit`
    idleTimeout: 30000, // idle connections timeout, in milliseconds, the default value 60000
    queueLimit: 0,
    enableKeepAlive: true,
    keepAliveInitialDelay: 0,
});

// const connection = mysql.createConnection({
//     host: "127.0.0.1",
//     user: "root",
//     password: "",
//     database: "storys",
//     port: 3306,
// });

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

function handle_category(item) {
    return new Promise((resolve, reject) => {
        connection.query(
            `select id from st_category where slug = '${item.slug}' or crawler_href = '${item.crawler_href}'`,
            (error, elements) => {
                if (error) {
                    return reject(error);
                }
                if (elements.length > 0) {
                    return resolve(elements[0].id);
                } else {
                    item.is_status = 2;
                    connection.query(
                        "INSERT INTO st_category SET ?",
                        { ...item, parent_id: 0 },
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

function handle_author(item) {
    return new Promise((resolve, reject) => {
        connection.query(
            `select id from st_author where slug = '${item.slug}' limit 1`,
            (error, elements) => {
                if (error) {
                    return reject(error);
                }
                if (elements.length > 0) {
                    return resolve(elements[0].id);
                } else {
                    item.is_status = 2;
                    connection.query(
                        "INSERT INTO st_author SET ?",
                        { ...item },
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
function update_crawler_map(id, item) {
    return new Promise((resolve, reject) => {
        connection.query(
            "UPDATE crawler_map SET ? WHERE id = ?",
            [{ ...item, is_status: 0 }, id], // Sử dụng parameterized queries
            function (error, results) {
                if (error) {
                    console.error("Error updating crawler_map:", error);
                    return reject(error); // Trả về lỗi nếu xảy ra
                }
                if (results.affectedRows === 0) {
                    return reject(new Error("No record found to update"));
                }
                console.log("Record updated successfully, ID:", id);
                return resolve(results.affectedRows); // Trả về số bản ghi đã cập nhật
            }
        );
    });
}

module.exports = {
    query,
    execute,
    handle_post,
    handle_crawler_map,
    update_crawler_map,
    closeConnection,
    connection,
};
