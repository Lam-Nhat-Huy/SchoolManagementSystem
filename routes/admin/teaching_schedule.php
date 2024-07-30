<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeachingSchedule;

Route::prefix('teaching_schedule')->group(function () {
    Route::get('/index', [TeachingSchedule::class, 'index'])->name('teaching_schedule.index');
});
