<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleOrPermissionController;
use App\Http\Controllers\ForgotPasswordController;

Route::get('/',function (){
    return redirect()->route('students.index');
});
Route::resource('/students', \App\Http\Controllers\StudentController::class);
Route::resource('/classes', \App\Http\Controllers\ClassroomController::class);
Route::resource('/departments', \App\Http\Controllers\DepartmentController::class);






