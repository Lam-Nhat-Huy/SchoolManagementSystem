<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassrooomController;

Route::prefix('classroom')->group(function () {
    Route::get('/index', [ClassrooomController::class, 'index'])->name('classroom.index');
    Route::get('/create', [ClassrooomController::class, 'create'])->name('classroom.create');
    Route::post('/store', [ClassrooomController::class, 'store'])->name('classroom.store');
    Route::get('/edit/{id}', [ClassrooomController::class, 'edit'])->name('classroom.edit')->where(['id' => '[0-9]+']);
    Route::post('/update', [ClassrooomController::class, 'update'])->name('classroom.update');
    Route::post('/trash/{id}', [ClassrooomController::class, 'trash'])->name('classroom.trash')->where(['id' => '[0-9]+']);
    Route::post('/restore/{id}', [ClassrooomController::class, 'restore'])->name('classroom.restore')->where(['id' => '[0-9]+']);
    Route::post('/delete/{id}', [ClassrooomController::class, 'delete'])->name('classroom.delete')->where(['id' => '[0-9]+']);
});
