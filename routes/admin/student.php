<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\StudentController;

Route::prefix('student')->group(function () {
    Route::get('/index', [StudentController::class, 'index'])->name('student.index');

    Route::get('/saveToSession/{id}', [StudentController::class, 'saveToSession'])->name('student.saveToSession')->where(['id' => '[0-9]+']);

    Route::get('/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/store', [StudentController::class, 'store'])->name('student.store');

    Route::get('/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::post('/update', [StudentController::class, 'update'])->name('student.update');

    Route::get('/delete/{id}', [StudentController::class, 'delete'])->name('student.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [StudentController::class, 'destroy'])->name('student.destroy')->where(['id' => '[0-9]+']);
});
