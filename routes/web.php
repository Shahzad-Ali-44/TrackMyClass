<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentFormController;
use App\Http\Controllers\ContactController;


Route::get('/', [StudentFormController::class,"create"]);

Route::post('/formSubmit', [StudentFormController::class,"store"]);

Route::get('/formShow', [StudentFormController::class,"index"]);

Route::get('/editForm/{id}', [StudentFormController::class,"edit"]);
Route::post('/update', [StudentFormController::class,"update"]);

Route::get('/deleteForm/{id}' , [StudentFormController::class,"destroy"]);


Route::get('/contact', [ContactController::class, 'create']);
Route::post('/contactSubmit', [ContactController::class, 'store']);
