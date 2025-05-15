<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleOrPermissionController;

Route::resource('/students',\App\Http\Controllers\StudentController::class)->middleware('auth');
Route::resource('/classes',\App\Http\Controllers\ClassController::class);


Route::get('/', [AuthController::class, 'ShowFormLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');
Route::delete('/users/{user}', [AuthController::class, 'destroy'])->name('users.destroy');
Route::middleware('role:admin')->group(function () {
    Route::get('/list-account',[\App\Http\Controllers\RoleOrPermissionController::class,'index'])->name('list-account');
    Route::post('/list-account/{user}/change-role', [RoleOrPermissionController::class, 'changeRole'])->name('users.changeRole');
    Route::get('/update-permission-for-role',[RoleOrPermissionController::class,'listPermission'])->name('list.permission');
    Route::post('/list-permission/update',[RoleOrPermissionController::class,'updatePermission'])->name('update.permission');

    Route::get('/roles',[RoleOrPermissionController::class,'listRole'])->name('roles.index');
    Route::get('/roles/create',[RoleOrPermissionController::class,'createRole'])->name('roles.create');
    Route::post('/roles',[RoleOrPermissionController::class,'storeRole'])->name('roles.store');
    Route::delete('/roles/{id}', [RoleOrPermissionController::class, 'destroyRole'])->name('roles.destroy');
});




