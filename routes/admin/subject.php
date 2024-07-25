<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SubjectController;

Route::prefix('subject')->group(function () {
    Route::get('/index', [SubjectController::class, 'index'])->name('subject.index');

    Route::get('/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/store', [SubjectController::class, 'store'])->name('subject.store');

    Route::get('/edit/{id}', [SubjectController::class, 'edit'])->name('subject.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [SubjectController::class, 'update'])->name('subject.update')->where(['id' => '[0-9]+']);

    Route::get('/delete/{id}', [SubjectController::class, 'delete'])->name('subject.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy')->where(['id' => '[0-9]+']);
});
