<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ClassController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EnrollmentController;
use App\Http\Controllers\Admin\EnrollmentStudentController;
use App\Http\Controllers\Admin\SchedulesController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\EvaluationedController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\StudentChatController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\TeachingSchedule;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authentication;
use App\Http\Middleware\Authenticationed;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('login')->middleware(Authenticationed::class)->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login.index');

    Route::post('/send_otp', [LoginController::class, 'send_otp'])->name('login.send_otp');

    Route::get('/enter_otp', [LoginController::class, 'enter_otp'])->name('login.enter_otp');

    Route::post('/confirm_otp', [LoginController::class, 'confirm_otp'])->name('login.confirm_otp');
});

Route::get('/auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');

Route::get('/auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('auth.google.callback');

Route::prefix('wp-admin')->middleware(Authentication::class)->group(function () {
    Route::get('/trang-chu', [DashboardController::class, 'index'])->name('dashboard.index');

    Route::prefix('user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');

        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');

        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('student')->group(function () {
        Route::get('/index', [StudentController::class, 'index'])->name('student.index');

        Route::get('/create', [StudentController::class, 'create'])->name('student.create');
        Route::post('/store', [StudentController::class, 'store'])->name('student.store');

        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('subject')->group(function () {
        Route::get('/index', [SubjectController::class, 'index'])->name('subject.index');

        Route::get('/create', [SubjectController::class, 'create'])->name('subject.create');
        Route::post('/store', [SubjectController::class, 'store'])->name('subject.store');

        Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [SubjectController::class, 'update'])->name('subject.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('class')->group(function () {
        Route::get('/index', [ClassController::class, 'index'])->name('class.index');

        Route::get('/create', [ClassController::class, 'create'])->name('class.create');
        Route::post('/store', [ClassController::class, 'store'])->name('class.store');

        Route::get('/edit/{id}', [ClassController::class, 'edit'])->name('class.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [ClassController::class, 'update'])->name('class.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [ClassController::class, 'delete'])->name('class.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [ClassController::class, 'destroy'])->name('class.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('teacher')->group(function () {
        Route::get('/index', [TeacherController::class, 'index'])->name('teacher.index');

        Route::get('/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/store', [TeacherController::class, 'store'])->name('teacher.store');

        Route::get('/edit/{id}', [TeacherController::class, 'edit'])->name('teacher.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [TeacherController::class, 'update'])->name('teacher.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [TeacherController::class, 'delete'])->name('teacher.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [TeacherController::class, 'destroy'])->name('teacher.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('course')->group(function () {
        Route::get('/index', [CourseController::class, 'index'])->name('course.index');

        Route::get('/create', [CourseController::class, 'create'])->name('course.create');
        Route::post('/store', [CourseController::class, 'store'])->name('course.store');

        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('course.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [CourseController::class, 'update'])->name('course.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [CourseController::class, 'delete'])->name('course.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [CourseController::class, 'destroy'])->name('course.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('account')->group(function () {
        Route::get('/index', [AccountController::class, 'index'])->name('account.index');

        Route::get('/create', [AccountController::class, 'create'])->name('account.create');
        Route::post('/store', [AccountController::class, 'store'])->name('account.store');

        Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('account.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [AccountController::class, 'update'])->name('account.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [AccountController::class, 'delete'])->name('account.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [AccountController::class, 'destroy'])->name('account.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('evaluation')->group(function () {
        Route::get('/index', [EvaluationController::class, 'index'])->name('evaluation.index');

        Route::get('/create', [EvaluationController::class, 'create'])->name('evaluation.create');
        Route::post('/store', [EvaluationController::class, 'store'])->name('evaluation.store');

        Route::get('/edit/{id}', [EvaluationController::class, 'edit'])->name('evaluation.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [EvaluationController::class, 'update'])->name('evaluation.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [EvaluationController::class, 'delete'])->name('evaluation.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [EvaluationController::class, 'destroy'])->name('evaluation.destroy')->where(['id' => '[0-9]+']);
    });

    //Lịch học
    Route::prefix('schedule')->group(function () {
        Route::get('/index', [SchedulesController::class, 'index'])->name('schedule.index');

        Route::get('/create', [SchedulesController::class, 'create'])->name('schedule.create');
        Route::post('/store', [SchedulesController::class, 'store'])->name('schedule.store');

        Route::get('/edit/{id}', [SchedulesController::class, 'edit'])->name('schedule.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [SchedulesController::class, 'update'])->name('schedule.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [SchedulesController::class, 'delete'])->name('schedule.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [SchedulesController::class, 'destroy'])->name('schedule.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('teaching_schedule')->group(function () {
        Route::get('/index', [TeachingSchedule::class, 'index'])->name('teaching_schedule.index');
    });

    Route::prefix('student')->group(function () {
        Route::get('/index', [StudentController::class, 'index'])->name('student.index');

        Route::get('/create', [StudentController::class, 'create'])->name('student.create');
        Route::get('/store', [StudentController::class, 'store'])->name('student.store');
        Route::post('/store', [StudentController::class, 'store'])->name('student.store');
        Route::get('/edit/{id}', [StudentController::class, 'store'])->name('student.edit');

        Route::get('/edit/{id}', [StudentController::class, 'edit'])->name('student.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [StudentController::class, 'update'])->name('student.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('evaluationed')->group(function () {
        Route::get('/index', [EvaluationedController::class, 'index'])->name('evaluationed.index');

        Route::get('/create', [EvaluationedController::class, 'create'])->name('evaluationed.create');
        Route::post('/store', [EvaluationedController::class, 'store'])->name('evaluationed.store');

        Route::get('/edit/{id}', [EvaluationedController::class, 'edit'])->name('evaluationed.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [EvaluationedController::class, 'update'])->name('evaluationed.update')->where(['id' => '[0-9]+']);

        Route::get('/delete/{id}', [EvaluationedController::class, 'delete'])->name('evaluationed.delete')->where(['id' => '[0-9]+']);
        Route::delete('/destroy/{id}', [EvaluationedController::class, 'destroy'])->name('evaluationed.destroy')->where(['id' => '[0-9]+']);
    });

    Route::prefix('enrollment')->group(function () {
        Route::get('/index', [EnrollmentController::class, 'index'])->name('enrollment.index');

        Route::get('/edit/{id}', [EnrollmentController::class, 'edit'])->name('enrollment.edit')->where(['id' => '[0-9]+']);
        Route::post('/update/{id}', [EnrollmentController::class, 'update'])->name('enrollment.update')->where(['id' => '[0-9]+']);
    });
    Route::prefix('enrollment_student')->group(function () {
        Route::get('/index', [EnrollmentStudentController::class, 'index'])->name('enrollment_student.index');
    });

    Route::prefix('traning_officer_chat')->group(function () {
        Route::get('/index', [ChatController::class, 'index'])->name('traning_officer_chat.index');

        Route::get('/detail/{id}', [ChatController::class, 'detail'])->name('traning_officer_chat.detail')->where(['id' => '[0-9]+']);
        Route::post('/store', [ChatController::class, 'store'])->name('traning_officer_chat.store');
    });

    Route::prefix('student_chat')->group(function () {
        Route::get('/index', [StudentChatController::class, 'index'])->name('student_chat.index');
        
        Route::post('/store', [StudentChatController::class, 'store'])->name('student_chat.store');
    });
});
