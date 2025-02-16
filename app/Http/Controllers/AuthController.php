<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use GuzzleHttp\Client as GuzzleClient;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function profile(Request $request)
    {
        $orders = Order::where('user_id', Auth::guard('web')->id())->paginate(10);
        $data = [
            'profile' => Auth::guard('web')->user(),
            'orders' => $orders
        ];

        return view('front_end.profile', $data);
    }


    public function login(Request $request)
    { 
        if ($request->isMethod('post')) {
            // Validate input
            $validator = Validator::make($request->all(), [
                'email' => 'required|email',
                'password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 422);
            } 

            try {
                  
                // Thay vì dùng Guzzle, bạn có thể gọi phương thức trong cùng controller hoặc nơi khác
                $response = app()->handle(Request::create('/oauth/token', 'POST', [
                    'grant_type' => 'password',
                    'client_id' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_ID'),
                    'client_secret' => env('PASSPORT_PERSONAL_ACCESS_CLIENT_SECRET'),
                    'username' => $request->email,
                    'password' => $request->password,
                    'scope' => '*',
                ]));

                $result = json_decode($response->getContent(), true); 

                // Nếu có lỗi xảy ra, trả về lỗi
                if (isset($result['error'])) {
                    return response()->json([
                        'error' => 'Invalid credentials',
                        'message' => $result['message']
                    ], 401);
                }

                // Xác thực người dùng trong phiên Laravel
                $user = User::where('email', $request->email)->first();
                if ($user) {
                    Auth::login($user);
                }

                // Trả về kết quả bao gồm access_token và refresh_token
                return response()->json($result);
            } catch (\Exception $e) {

                // Xử lý các lỗi khác như kết nối đến server OAuth2 thất bại
                return response()->json([
                    'error' => 'Server error',
                    'message' => $e->getMessage()
                ], 500);
            }
        }
        return view('front_end.auth.login');
    }

    public function refreshToken(Request $request)
    {
        $http = new GuzzleClient;

        $response = $http->post(url('/oauth/token'), [
            'form_params' => [
                'grant_type' => 'refresh_token',
                'refresh_token' => $request->refresh_token,
                'client_id' => $request->client_id,
                'client_secret' => $request->client_secret,
                'scope' => '*',
            ],
        ]);

        return json_decode((string) $response->getBody(), true);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        if($request->ajax())return response()->json(['message' => 'Logged out successfully'], 200);
        return redirect( '/');
    } 

    // Tạo tài khoản
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:st_users,email',
            'password' => 'required|string|min:8',
        ], [
            'name.required' => 'Họ và tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu tối thiểu 8 ký tự',
            'password.confirmed' => 'Xác thực mật khẩu không đúng',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'Tạo tài khoản thành công'], 201);
    }

    // Quên mật khẩu
    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink($request->only('email'));

        if ($status === Password::RESET_LINK_SENT) {
            return response()->json(['message' => 'Đã gửi link đặt lại mật khẩu'], 200);
        } else {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại'], 500);
        }
    }

    // Đặt lại mật khẩu
    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            return response()->json(['message' => 'Đặt lại mật khẩu thành công'], 200);
        } else {
            return response()->json(['message' => 'Có lỗi xảy ra, vui lòng thử lại'], 500);
        }
    }
}
