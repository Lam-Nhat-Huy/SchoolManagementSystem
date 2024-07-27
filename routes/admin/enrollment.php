<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EnrollmentController;

Route::prefix('enrollment')->group(function () {
    Route::get('/index', [EnrollmentController::class, 'index'])->name('enrollment.index');
    Route::get('/edit/{id}', [EnrollmentController::class, 'edit'])->name('enrollment.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [EnrollmentController::class, 'update'])->name('enrollment.update')->where(['id' => '[0-9]+']);
});
