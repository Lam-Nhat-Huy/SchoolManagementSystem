<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassSubjectController;

Route::prefix('class-subject')->group(function () {
    Route::get('/index/{courseId?}/{majorId?}/{subjectId?}', [ClassSubjectController::class, 'index'])->name('class-subject.index');
    Route::get('/create', [ClassSubjectController::class, 'create'])->name('class-subject.create');
    Route::get('/filter', [ClassSubjectController::class, 'filter'])->name('class-subject.filter');
    Route::post('/store', [ClassSubjectController::class, 'store'])->name('class-subject.store');
    Route::post('/storeStudent/{id}', [ClassSubjectController::class, 'storeStudent'])->name('class-subject.storeStudent')->where(['id' => '[0-9]+']);
    Route::post('/storeSchedule/{id}', [ClassSubjectController::class, 'storeSchedule'])->name('class-subject.storeSchedule')->where(['id' => '[0-9]+']);
    Route::get('/create-schedule/{id}', [ClassSubjectController::class, 'schedule'])->name('class-subject.schedule')->where(['id' => '[0-9]+']);
    Route::get('/create-student/{id}', [ClassSubjectController::class, 'student'])->name('class-subject.student')->where(['id' => '[0-9]+']);
    Route::get('/edit/{id}', [ClassSubjectController::class, 'edit'])->name('class-subject.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [ClassSubjectController::class, 'update'])->name('class-subject.update')->where(['id' => '[0-9]+']);
    Route::get('/delete/{id}', [ClassSubjectController::class, 'delete'])->name('class-subject.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [ClassSubjectController::class, 'destroy'])->name('class-subject.destroy')->where(['id' => '[0-9]+']);
    Route::get('/restore/{id}', [ClassSubjectController::class, 'restore'])->name('class-subject.restore')->where(['id' => '[0-9]+']);
    Route::post('/forceDelete/{id}', [ClassSubjectController::class, 'forceDelete'])->name('class-subject.forceDelete')->where(['id' => '[0-9]+']);
});
