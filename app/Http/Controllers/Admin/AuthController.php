<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = [
                'email' => $request->email ?? '',
                'password' => $request->password ?? '',
            ];
            $remember_me = $request->remember ? true : false;
            if (Auth::guard('admin')->attempt($data, $remember_me)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->withInput()->with('notification_error', 'Tài khoản hoặc mật khẩu không chính xác !!!');
            }
        }
        return view('admin.auth.login');
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function profile(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = [
                'email' => $request->email ?? '',
                'password' => $request->password ?? '',
            ];
            if (Auth::guard('admin')->attempt($data)) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->back()->withInput()->with('notification_error', 'Tài khoản hoặc mật khẩu không chính xác !!!');
            }
        }

        return view('admin.auth.profile');
    }
}
