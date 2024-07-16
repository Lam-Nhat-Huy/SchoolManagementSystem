<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('auth.index');
Route::get('/wp-admin', [AuthController::class, 'index'])->name('auth.index');


Route::prefix('wp-admin')->group(function () {
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
});
