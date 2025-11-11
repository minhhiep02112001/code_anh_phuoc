// Yêu cầu các thư viện jQuery và Cookies.js
// Thêm các script này vào HTML của bạn
// <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
// <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>

function setCookie(name, value, days) {
    var date = new Date();
    date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
    var expires = "expires=" + date.toUTCString();
    document.cookie =
        name + "=" + encodeURIComponent(value) + ";" + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(";");
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == " ") c = c.substring(1, c.length); // Xóa khoảng trắng
        if (c.indexOf(nameEQ) == 0)
            return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function deleteCookie(name) {
    document.cookie =
        name + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
}

const auth = {
    csrfToken: function () {
        return $('meta[name="csrf-token"]').attr("content");
    },
    clientId: function () {
        return $('meta[name="client-id"]').attr("content");
    },
    clientSecret: function () {
        return $('meta[name="client-secret"]').attr("content");
    },
    login: function (email, password) {
        return $.ajax({
            url: "/login",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": this.csrfToken(),
            },
            data: {
                email: email,
                password: password,
            },
        })
            .done(function (response) {
                // Lưu trữ token sau khi đăng nhập thành công
                setCookie("authen_access_token", response.access_token, 1);
                setCookie("authen_refresh_token", response.refresh_token, 1);
                console.log("Đăng nhập thành công");
                return response; // Trả về response để tiếp tục xử lý
            })
            .fail(function (xhr) {
                console.error(
                    "Lỗi đăng nhập:",
                    xhr.responseText || xhr.statusText
                );
                throw xhr; // Ném lỗi để xử lý bên ngoài
            });
    },
    logout: function () {
        deleteCookie("authen_access_token");
        deleteCookie("authen_refresh_token");
        console.log("Đăng xuất thành công");
        // Tùy chọn: Chuyển hướng người dùng đến trang đăng nhập
        // window.location.href = '/login';
    },

    register: function (name, email, password) {
        return $.ajax({
            url: "/register",
            type: "POST",
            headers: {
                "X-CSRF-TOKEN": this.csrfToken(),
            },
            data: {
                name: name,
                email: email,
                password: password,
            },
            success: function (response) {
                console.log("Đăng ký thành công");
            },
            error: function (xhr, status, error) {
                console.error("Lỗi đăng ký:", error);
            },
        });
    },

    forgotPassword: function (email) {
        return $.ajax({
            url: "/password/email",
            headers: {
                "X-CSRF-TOKEN": this.csrfToken(),
            },
            type: "POST",
            data: {
                email: email,
            },
            success: function (response) {
                console.log("Email đặt lại mật khẩu đã được gửi");
            },
            error: function (xhr, status, error) {
                console.error("Lỗi quên mật khẩu:", error);
            },
        });
    },

    refreshTokenAndRetry: function (originalRequest) {
        return $.ajax({
            url: "/oauth/token",
            headers: {
                "X-CSRF-TOKEN": this.csrfToken(),
            },
            type: "POST",
            data: {
                grant_type: "refresh_token",
                refresh_token: getCookie("authen_refresh_token"),
                client_id: this.clientId(), // Thay bằng client_id của bạn
                client_secret: this.clientSecret(), // Thay bằng client_secret của bạn
            },
            success: function (response) {
                setCookie("authen_access_token", response.access_token, 1);
                setCookie("authen_refresh_token", response.refresh_token, 1);
                // Thử lại yêu cầu ban đầu với token mới
                originalRequest.headers["Authorization"] =
                    "Bearer " + response.access_token;
                return $.ajax(originalRequest);
            },
            error: function (xhr, status, error) {
                console.error("Lỗi làm mới token:", error);
                // Tùy chọn: Chuyển hướng đến trang đăng nhập hoặc hiển thị lỗi
            },
        });
    },

    ajaxWithAuth: function (options) {
        const token = getCookie("authen_access_token");
        if (token) {
            options.headers = options.headers || {};
            options.headers["Authorization"] = "Bearer " + token;
            options.headers["X-CSRF-TOKEN"] = this.csrfToken();
            return $.ajax(options).fail((xhr) => {
                if (xhr.status === 401) {
                    return auth.refreshTokenAndRetry(options);
                }
            });
        } else {
            console.error("Không tìm thấy access token");
            // Tùy chọn: Chuyển hướng người dùng đến trang đăng nhập
        }
    },
};

("use strict");
document.addEventListener("DOMContentLoaded", function () {
    Authentication.init();
});

// Xử lý sự kiện submit form quên mật khẩu (nếu cần)

//  update event

let Authentication = (function () {
    const _action = () => {
        // Hàm để hiển thị form quên mật khẩu
        function showRecoverPasswordForm() {
            $("#login").hide(); // Ẩn form đăng nhập
            $("#recover-password").show(); // Hiển thị form quên mật khẩu
        }

        // Hàm để ẩn form quên mật khẩu và quay lại form đăng nhập
        function hideRecoverPasswordForm() {
            $("#recover-password").hide(); // Ẩn form quên mật khẩu
            $("#login").show(); // Hiển thị lại form đăng nhập
        }

        $(document).on("submit", "#customer_login", function (e) {
            e.preventDefault();
            const email = $("#customer_email").val();
            const password = $("#customer_password").val();
            // Xóa thông báo lỗi cũ (nếu có)
            $(".box_error").text("");
            auth.login(email, password)
                .done(() => {
                    console.log("Login success");
                    $.notify("Đăng nhập thành công", "success");
                    window.location.href = "/"; // Chuyển hướng sau khi đăng nhập thành công
                })
                .fail((error) => {
                    let errorMessage =
                        "Đăng nhập thất bại: Có lỗi xảy ra. Vui lòng thử lại.";

                    if (error.status === 401) {
                        errorMessage =
                            "Đăng nhập thất bại: Thông tin đăng nhập không chính xác.";
                    } else if (error.status === 422) {
                        errorMessage =
                            "Đăng nhập thất bại: Dữ liệu không hợp lệ.";
                    } else if (
                        error.responseJSON &&
                        error.responseJSON.message
                    ) {
                        errorMessage =
                            "Đăng nhập thất bại: " + error.responseJSON.message;
                    }
                    $(".box_error").text(errorMessage);
                });
        });

        $(document).on("submit", "#customer_forgot_password", function (e) {
            e.preventDefault();
            const email = $("#recover-email").val();

            // Xử lý quên mật khẩu qua AJAX
            auth.forgotPassword(email)
                .then(() => {
                    $.notify(
                        "Email đặt lại mật khẩu đã được gửi. Vui lòng kiểm tra hộp thư của bạn.",
                        "success"
                    );

                    hideRecoverPasswordForm(); // Quay lại form đăng nhập sau khi yêu cầu thành công
                })
                .catch((error) => {
                    $.notify("Có lỗi xảy ra. Vui lòng thử lại.", "error");
                });
        });
        $(document).on("submit", "#create_customer", function (e) {
            let _this = $(this);
            e.preventDefault();
            const name = $("#customer_name_register").val();
            const email = $("#customer_email_register").val();
            const password = $("#customer_password_register").val();
            $(".box-error-register").html("");
            auth.register(name, email, password)
                .done(() => {
                    $.notify("Tạo thành công", "success");
                    _this[0].reset(); // Reset form sau khi đăng ký thành công
                    hideRecoverPasswordForm(); // Chuyển hướng sau khi đăng ký thành công
                })
                .fail((xhr) => {
                    if (xhr.status === 422) {
                        // Xử lý lỗi xác thực từ Laravel
                        let errors = xhr.responseJSON.errors;
                        for (let field in errors) {
                            $(".box-error-register").append(
                                '<li style="color:red; text-align:left;display:block;"> ' +
                                    errors[field][0] +
                                    " </li>"
                            );
                            return;
                        }
                    }
                });
        });
    };

    const _event = () => {};
    return {
        init: function () {
            _action();
        },
    };
})();
