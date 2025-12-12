const mysql = require("mysql2");

const connection = mysql.createPool({
    connectionLimit: 100,
    host: "212.56.45.0",
    user: "developer",
    password: "developer123@",
    database: "db_restaurant", 
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
  
function update_crawler_map(id, item, is_status = 0) {
    return new Promise((resolve, reject) => {
        connection.query(
            "UPDATE crawler_map SET ? WHERE id = ?",
            [{ ...item, is_status: is_status }, id], // Sử dụng parameterized queries
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
    update_crawler_map,
    closeConnection,
    connection,
};
