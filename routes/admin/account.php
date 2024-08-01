<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AccountController;

Route::prefix('account')->group(function () {
    Route::get('/index', [AccountController::class, 'index'])->name('account.index');

    Route::get('/create', [AccountController::class, 'create'])->name('account.create');
    Route::post('/store', [AccountController::class, 'store'])->name('account.store');

    Route::get('/edit/{id}', [AccountController::class, 'edit'])->name('account.edit')->where(['id' => '[0-9]+']);
    Route::post('/update', [AccountController::class, 'update'])->name('account.update');

    Route::post('/trash/{id}', [AccountController::class, 'trash'])->name('account.trash')->where(['id' => '[0-9]+']);

    Route::post('/restore/{id}', [AccountController::class, 'restore'])->name('account.restore')->where(['id' => '[0-9]+']);

    Route::post('/delete/{id}', [AccountController::class, 'delete'])->name('account.delete')->where(['id' => '[0-9]+']);
});
