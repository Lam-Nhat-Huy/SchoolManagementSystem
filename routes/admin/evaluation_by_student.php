<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\EvaluationByStudentController;

Route::prefix('evaluation_by_student')->group(function () {
    Route::get('/index', [EvaluationByStudentController::class, 'index'])->name('evaluation_by_student.index');

    Route::get('/feedback/{id}', [EvaluationByStudentController::class, 'feedback'])->name('evaluation_by_student.feedback')->where(['id' => '[0-9]+']);
    Route::post('/store', [EvaluationByStudentController::class, 'store'])->name('evaluation_by_student.store');
});
