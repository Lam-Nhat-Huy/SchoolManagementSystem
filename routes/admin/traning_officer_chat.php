<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChatController;

Route::prefix('traning_officer_chat')->group(function () {
    Route::get('/index', [ChatController::class, 'index'])->name('traning_officer_chat.index');

    Route::get('/detail/{id}', [ChatController::class, 'detail'])->name('traning_officer_chat.detail')->where(['id' => '[0-9]+']);
    Route::post('/store', [ChatController::class, 'store'])->name('traning_officer_chat.store');
});
