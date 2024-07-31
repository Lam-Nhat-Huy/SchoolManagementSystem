<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EvaluationController;

Route::prefix('evaluation')->group(function () {
    Route::get('/index', [EvaluationController::class, 'index'])->name('evaluation.index');

    Route::get('/create', [EvaluationController::class, 'create'])->name('evaluation.create');
    
    Route::post('/store', [EvaluationController::class, 'store'])->name('evaluation.store');

    Route::get('/edit/{id}', [EvaluationController::class, 'edit'])->name('evaluation.edit')->where(['id' => '[0-9]+']);

    Route::post('/update', [EvaluationController::class, 'update'])->name('evaluation.update');

    Route::post('/trash/{id}', [EvaluationController::class, 'trash'])->name('evaluation.trash')->where(['id' => '[0-9]+']);

    Route::post('/restore/{id}', [EvaluationController::class, 'restore'])->name('evaluation.restore')->where(['id' => '[0-9]+']);

    Route::post('/delete/{id}', [EvaluationController::class, 'delete'])->name('evaluation.delete')->where(['id' => '[0-9]+']);
});
