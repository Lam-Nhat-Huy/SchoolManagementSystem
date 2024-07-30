<?php

use App\Helpers\RouteLoader;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Middleware\Authentication;


Route::prefix('wp-admin')->middleware(Authentication::class)->group(function () {
    Route::get('/trang-chu', [DashboardController::class, 'index'])->name('dashboard.index');
    RouteLoader::load(__DIR__, "/");
});
