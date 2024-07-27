<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EvaluationedController;

Route::prefix('evaluationed')->group(function () {
    Route::get('/index', [EvaluationedController::class, 'index'])->name('evaluationed.index');

    Route::get('/create', [EvaluationedController::class, 'create'])->name('evaluationed.create');
    Route::post('/store', [EvaluationedController::class, 'store'])->name('evaluationed.store');

    Route::get('/edit/{id}', [EvaluationedController::class, 'edit'])->name('evaluationed.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [EvaluationedController::class, 'update'])->name('evaluationed.update')->where(['id' => '[0-9]+']);

    Route::get('/delete/{id}', [EvaluationedController::class, 'delete'])->name('evaluationed.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [EvaluationedController::class, 'destroy'])->name('evaluationed.destroy')->where(['id' => '[0-9]+']);
});
