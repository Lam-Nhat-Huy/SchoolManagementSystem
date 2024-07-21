<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('google_id', $user->id)->first();
        if ($findUser) {
            Auth::login($findUser);
            return redirect()->route('dashboard.index');
        } else {
            $user = User::updateOrCreate([
                'email' => $user->email,
            ], [
                'name' => $user->name,
                'google_id' => $user->id,
                'password' => encrypt('123456789'),
            ]);

            Auth::login($user);
        }

        return redirect()->route('dashboard.index');
    }
}
