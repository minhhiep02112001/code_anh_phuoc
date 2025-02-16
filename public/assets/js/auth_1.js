// Yêu cầu các thư viện jQuery và Cookies.js
// Thêm các script này vào HTML của bạn
// <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
// <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/2.2.1/js.cookie.min.js"></script>

const auth = {
    login: function(email, password) {
        return $.ajax({
            url: '/login',
            type: 'POST',
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                Cookies.set('authen_access_token', response.access_token);
                Cookies.set('authen_refresh_token', response.refresh_token);
                console.log('Đăng nhập thành công');
            },
            error: function(xhr, status, error) {
                console.error('Lỗi đăng nhập:', error);
            }
        });
    },

    logout: function() {
        Cookies.remove('authen_access_token');
        Cookies.remove('authen_refresh_token');
        console.log('Đăng xuất thành công');
        // Optionally, you can redirect the user to the login page
        // window.location.href = '/login';
    },

    register: function(name, email, password) {
        return $.ajax({
            url: '/register',
            type: 'POST',
            data: {
                name: name,
                email: email,
                password: password
            },
            success: function(response) {
                console.log('Đăng ký thành công');
            },
            error: function(xhr, status, error) {
                console.error('Lỗi đăng ký:', error);
            }
        });
    },

    forgotPassword: function(email) {
        return $.ajax({
            url: '/password/email',
            type: 'POST',
            data: {
                email: email
            },
            success: function(response) {
                console.log('Email đặt lại mật khẩu đã được gửi');
            },
            error: function(xhr, status, error) {
                console.error('Lỗi quên mật khẩu:', error);
            }
        });
    },

    refreshTokenAndRetry: function(originalRequest) {
        return $.ajax({
            url: '/oauth/token',
            type: 'POST',
            data: {
                grant_type: 'refresh_token',
                refresh_token: Cookies.get('authen_refresh_token'),
                client_id: 'your-client-id',  // Thay bằng client_id của bạn
                client_secret: 'your-client-secret'  // Thay bằng client_secret của bạn
            },
            success: function(response) {
                Cookies.set('authen_access_token', response.access_token);
                Cookies.set('authen_refresh_token', response.refresh_token);

                // Retry original request with new token
                originalRequest.headers['Authorization'] = 'Bearer ' + response.access_token;
                return $.ajax(originalRequest);
            },
            error: function(xhr, status, error) {
                console.error('Lỗi làm mới token:', error);
                // Redirect to login or show error
            }
        });
    },

    ajaxWithAuth: function(options) {
        const token = Cookies.get('authen_access_token');
        if (token) {
            options.headers = options.headers || {};
            options.headers['Authorization'] = 'Bearer ' + token;

            return $.ajax(options).fail((xhr) => {
                if (xhr.status === 401) {
                    return auth.refreshTokenAndRetry(options);
                }
            });
        } else {
            console.error('Không tìm thấy access token');
        }
    }
};
