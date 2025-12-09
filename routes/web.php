<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentFormController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', [StudentFormController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/student/create', [StudentFormController::class, 'create'])->name('student.create');
    Route::post('/student/store', [StudentFormController::class, 'store'])->name('student.store');
    Route::get('/student/{id}/edit', [StudentFormController::class, 'edit'])->name('student.edit');
    Route::post('/student/update', [StudentFormController::class, 'update'])->name('student.update');
    Route::delete('/student/{id}', [StudentFormController::class, 'destroy'])->name('student.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
