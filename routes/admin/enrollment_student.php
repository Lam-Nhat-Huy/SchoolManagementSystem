<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EnrollmentStudentController;

Route::prefix('enrollment_student')->group(function () {
    Route::get('/index', [EnrollmentStudentController::class, 'index'])->name('enrollment_student.index');
});
