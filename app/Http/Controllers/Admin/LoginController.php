<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ConfirmOtpRequest;
use App\Http\Requests\SendOtpRequest;
use App\Mail\SendOtpLogin;
use App\Models\Account;
use App\Models\Students;
use App\Models\Teachers;
use App\Models\TrainingOfficer\TrainingOfficerAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->role_id)) {
            $request->session()->put('user_role_login', $request->role_id);
        }

        // Giao diện đăng nhập
        return view('admin.auth.login');
    }

    public function send_otp(SendOtpRequest $request)
    {
        $data = $request->validated();

        if (!empty(session('user_role_login') == 1)) {
            Account::where('email', '=', $data['email'])
                ->update(['OTP' => rand(111111, 999999)]);

            $getOtp = Account::select('OTP');
        } else if (!empty(session('user_role_login') == 2)) {
            Students::where('email', '=', $data['email'])
                ->update(['OTP' => rand(111111, 999999)]);

            $getOtp = Students::select('OTP');
        } else if (!empty(session('user_role_login') == 3)) {
            Teachers::where('email', '=', $data['email'])
                ->update(['OTP' => rand(111111, 999999)]);

            $getOtp = Teachers::select('OTP');
        } else {
            TrainingOfficerAccount::where('email', '=', $data['email'])
                ->update(['OTP' => rand(111111, 999999)]);

            $getOtp = TrainingOfficerAccount::select('OTP');
        }

        $getOtp = $getOtp
            ->where('email', $data['email'])
            ->where('role_id', session('user_role_login'))
            ->first();

        if ($getOtp) {
            $subject = 'Yêu Cầu Gửi Mã OTP Xác Thực';

            Mail::to($data['email'])->send(new SendOtpLogin($getOtp->OTP, $subject));

            $request->session()->put('session_otp', $getOtp->OTP);

            toastr()->success('Mã OTP Đã Gửi Về Email Của Bạn, Vui Lòng Kiểm Tra');
            return redirect()->route('login.enter_otp');
        } else {
            toastr()->error('Email không tồn tại trên hệ thống');
            return back();
        }
    }

    public function enter_otp(Request $request)
    {
        // Giao diện trang nhập mã OTP
        return view('admin.auth.enter_otp');
    }

    public function confirm_otp(ConfirmOtpRequest $request)
    {
        // Xác nhận mã OTP tại đây và lưu session('user_id'), session('user_name'), session('user_email'), session('user_role') sau đó redirect()->route('dashboard.index');
        $data = $request->validated();

        if ($data) {
            if (!empty(session('user_role_login') == 1)) {
                $confirmAccount = Account::where('OTP', session('session_otp'))->first();

                if ($confirmAccount) {
                    $request->session()->put('user_id', $confirmAccount->id);
                    $request->session()->put('user_name', $confirmAccount->name);
                    $request->session()->put('user_email', $confirmAccount->email);
                    $request->session()->put('user_role', $confirmAccount->role_id);
                } else {
                    toastr()->error('Mã OTP Không Chính Xác');
                    return back();
                }
            } else if (!empty(session('user_role_login') == 2)) {
                $confirmStudent = Students::where('OTP', session('session_otp'))->first();

                if ($confirmStudent) {
                    $request->session()->put('user_id', $confirmStudent->id);
                    $request->session()->put('user_name', $confirmStudent->name);
                    $request->session()->put('user_email', $confirmStudent->email);
                    $request->session()->put('user_phone', $confirmStudent->phone);
                    $request->session()->put('user_major_id', $confirmStudent->major_id);
                    $request->session()->put('user_year_of_enrollment', $confirmStudent->year_of_enrollment);
                    $request->session()->put('user_role', $confirmStudent->role_id);
                } else {
                    toastr()->error('Mã OTP Không Chính Xác');
                    return back();
                }
            } else if (!empty(session('user_role_login') == 3)) {
                $confirmTeacher = Teachers::where('OTP', session('session_otp'))->first();

                if ($confirmTeacher) {
                    $request->session()->put('user_id', $confirmTeacher->id);
                    $request->session()->put('user_name', $confirmTeacher->name);
                    $request->session()->put('user_email', $confirmTeacher->email);
                    $request->session()->put('user_phone', $confirmTeacher->phone);
                    $request->session()->put('user_course_id', $confirmTeacher->course_id);
                    $request->session()->put('user_role', $confirmTeacher->role_id);
                } else {
                    toastr()->error('Mã OTP Không Chính Xác');
                    return back();
                }
            } else {
                $confirmTrainingOfficer = TrainingOfficerAccount::where('OTP', session('session_otp'))->first();

                if ($confirmTrainingOfficer) {
                    $request->session()->put('user_id', $confirmTrainingOfficer->id);
                    $request->session()->put('user_email', $confirmTrainingOfficer->email);
                    $request->session()->put('user_role', $confirmTrainingOfficer->role_id);
                } else {
                    toastr()->error('Mã OTP Không Chính Xác');
                    return back();
                }
            }

            toastr()->success('Đăng Nhập Thành Công');
            return redirect()->route('dashboard.index');
        }
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
        $findTrainingOfficer = TrainingOfficerAccount::where('email', $user->email)->first();

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
            } elseif ($findTeacher) {
                $request->session()->put('user_id', $findTeacher->id);
                $request->session()->put('user_name', $findTeacher->name);
                $request->session()->put('user_email', $findTeacher->email);
                $request->session()->put('user_phone', $findTeacher->phone);
                $request->session()->put('user_course_id', $findTeacher->course_id);
                $request->session()->put('user_role', $findTeacher->role_id);
            } else {
                $request->session()->put('user_id', $findTrainingOfficer->id);
                $request->session()->put('user_email', $findTrainingOfficer->email);
                $request->session()->put('user_role', $findTrainingOfficer->role_id);
            }

            return redirect()->route('dashboard.index');
        }

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['user_name', 'user_email', 'user_phone', 'user_major_id', 'user_year_of_enrollment', 'user_role', 'user_course_id', 'user_id']);

        return redirect()->route('home');
    }
}
