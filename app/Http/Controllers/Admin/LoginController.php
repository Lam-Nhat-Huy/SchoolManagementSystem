<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Students;
use App\Models\Teachers;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        // Giao diện đăng nhập
        return view('admin.auth.login');
    }

    public function send_otp()
    {
        // Gửi mã OTP cho email đăng nhập tại đây
    }

    public function enter_otp()
    {
        // Giao diện trang nhập mã OTP
        return view('admin.auth.enter_otp');
    }

    public function confirm_otp()
    {
        // Xác nhận mã OTP tại đây và lưu session('user_id'), session('user_name'), session('user_email'), session('user_role') sau đó redirect()->route('dashboard.index');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        $user = Socialite::driver('google')->user();

        $findAccount = Account::where('email', $user->email)->first();
        $findStudent = Students::where('email', $user->email)->first();
        $findTeacher = Teachers::where('email', $user->email)->first();

        if ($findAccount || $findStudent || $findTeacher) {
            if ($findAccount) {
                $request->session()->put('user_id', $findAccount->id);
                $request->session()->put('user_name', $findAccount->name);
                $request->session()->put('user_email', $findAccount->email);
                $request->session()->put('user_role', $findAccount->role_id);
            } else if ($findStudent) {
                $request->session()->put('user_id', $findStudent->id);
                $request->session()->put('user_name', $findStudent->name);
                $request->session()->put('user_email', $findStudent->email);
                $request->session()->put('user_phone', $findStudent->phone);
                $request->session()->put('user_major_id', $findStudent->major_id);
                $request->session()->put('user_year_of_enrollment', $findStudent->year_of_enrollment);
                $request->session()->put('user_role', $findStudent->role_id);
            } else {
                $request->session()->put('user_id', $findTeacher->id);
                $request->session()->put('user_name', $findTeacher->name);
                $request->session()->put('user_email', $findTeacher->email);
                $request->session()->put('user_phone', $findTeacher->phone);
                $request->session()->put('user_course_id', $findTeacher->course_id);
                $request->session()->put('user_role', $findTeacher->role_id);
            }

            return redirect()->route('dashboard.index');
        }

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['user_name', 'user_email', 'user_phone', 'user_major_id', 'user_year_of_enrollment', 'user_role', 'user_course_id', 'user_id']);

        return redirect()->route('login.index');
    }
}
