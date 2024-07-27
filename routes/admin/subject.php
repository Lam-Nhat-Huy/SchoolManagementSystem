<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\DepartmentController;

Route::prefix('subject')->group(function () {
    Route::get('/index', [SubjectController::class, 'index'])->name('subject.index');

    Route::get('/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/store', [SubjectController::class, 'store'])->name('subject.store');

    Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [SubjectController::class, 'update'])->name('subject.update')->where(['id' => '[0-9]+']);

    Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy')->where(['id' => '[0-9]+']);
});

Route::prefix('department')->group(function () {
    Route::get('/index', [DepartmentController::class, 'index'])->name('department.index');

    Route::get('/create', [DepartmentController::class, 'create'])->name('department.create');
    Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');

    Route::get('/edit/{id}', [DepartmentController::class, 'edit'])->name('department.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [DepartmentController::class, 'update'])->name('department.update')->where(['id' => '[0-9]+']);

    Route::get('/delete/{id}', [DepartmentController::class, 'delete'])->name('department.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [DepartmentController::class, 'destroy'])->name('department.destroy')->where(['id' => '[0-9]+']);
});