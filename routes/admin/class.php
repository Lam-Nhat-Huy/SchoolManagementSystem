<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClassController;

Route::prefix('class')->group(function () {
    Route::get('/index', [ClassController::class, 'index'])->name('class.index');

    Route::get('/create', [ClassController::class, 'create'])->name('class.create');
    Route::post('/store', [ClassController::class, 'store'])->name('class.store');

    Route::get('/edit/{id}', [ClassController::class, 'edit'])->name('class.edit')->where(['id' => '[0-9]+']);
    Route::post('/update/{id}', [ClassController::class, 'update'])->name('class.update')->where(['id' => '[0-9]+']);

    Route::get('/delete/{id}', [ClassController::class, 'delete'])->name('class.delete')->where(['id' => '[0-9]+']);
    Route::delete('/destroy/{id}', [ClassController::class, 'destroy'])->name('class.destroy')->where(['id' => '[0-9]+']);
});
