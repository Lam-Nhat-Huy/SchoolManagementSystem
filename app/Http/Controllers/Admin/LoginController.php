<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // Giao diện đăng nhập
        return view('admin.auth.login');
    }

    public function send_otp() {
        // Gửi mã OTP cho email đăng nhập tại đây
    }

    public function enter_otp() {
        // Giao diện trang nhập mã OTP
        return view('admin.auth.enter_otp');
    }

    public function confirm_otp() {
        // Xác nhận mã OTP tại đây và lưu session('user_id'), session('user_name'), session('user_email'), session('user_role') sau đó redirect()->route('dashboard.index');  
    }
}
