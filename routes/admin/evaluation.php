<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EvaluationController;

Route::prefix('evaluation')->group(function () {
    Route::get('/index', [EvaluationController::class, 'index'])->name('evaluation.index');

    Route::get('/create', [EvaluationController::class, 'create'])->name('evaluation.create');
    Route::post('/store', [EvaluationController::class, 'store'])->name('evaluation.store');

    Route::get('/edit/{id}', [EvaluationController::class, 'edit'])->name('evaluation.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [EvaluationController::class, 'update'])->name('evaluation.update')->where(['id' => '[0-9]+']);

    Route::get('/delete/{id}', [EvaluationController::class, 'delete'])->name('evaluation.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [EvaluationController::class, 'destroy'])->name('evaluation.destroy')->where(['id' => '[0-9]+']);
});
