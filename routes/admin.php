<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\Authentication;
use Illuminate\Support\Facades\Log;

Route::prefix('wp-admin')->middleware(Authentication::class)->group(function () {
    Route::get('/trang-chu', [DashboardController::class, 'index'])->name('dashboard.index');

    $routeFiles = [
        'admin/user.php',
        'admin/student.php',
        'admin/subject.php',
        'admin/class.php',
        'admin/teacher.php',
        'admin/course.php',
        'admin/account.php',
        'admin/evaluation.php',
        'admin/evaluationed.php',
        'admin/schedule.php',
        'admin/teaching_schedule.php',
        'admin/enrollment.php',
        'admin/enrollment_student.php',
        'admin/student_chat.php',
        'admin/evaluation_by_student.php',
        'admin/subject_register.php',
        'admin/training_officer_account.php',
        'admin/training_officer_chat.php',
    ];

    foreach ($routeFiles as $routeFile) {
        $filePath = __DIR__ . '/' . $routeFile;
        if (file_exists($filePath)) {
            require $filePath;
        } else {
            Log::error("Route không tồn tại: " . $filePath);
        }
    }
});
