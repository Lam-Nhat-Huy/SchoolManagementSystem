<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeachingSchedule;

Route::prefix('teaching_schedule')->group(function () {
    Route::get('/index', [TeachingSchedule::class, 'index'])->name('teaching_schedule.index');
    Route::get('/dashboard', [TeachingSchedule::class, 'dashboard'])->name('teaching_schedule.dashboard');
    Route::get('/detail/{id}', [TeachingSchedule::class, 'detail'])->name('teaching_schedule.detail')->where(['id' => '[0-9]+']);
});
