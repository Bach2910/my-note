<?php

use Illuminate\Support\Facades\Route;

Route::resource('/students',\App\Http\Controllers\StudentController::class);
Route::resource('/classes',\App\Http\Controllers\ClassController::class);
Route::get('/', [\App\Http\Controllers\StudentController::class, 'index']);
