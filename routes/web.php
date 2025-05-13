<?php

use App\Http\Controllers\auth\CustomerAuthController;
use App\Http\Controllers\auth\ForgotPassWordController;
use App\Http\Controllers\auth\ResetPasswordController;
use App\Http\Controllers\dashboard\CustomerController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\FoodController;
use App\Http\Controllers\dashboard\NewCotroller;
use App\Http\Controllers\store\CommentController;
use App\Http\Controllers\store\RecipeController;
use Illuminate\Support\Facades\Route;


//Route::get('/', function () {
//    return view('welcome');
//});

//Login and Logout
Route::get('/login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomerAuthController::class, 'login']);
Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('logout');
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', function () {
        return view('admin.index');
    });
    Route::get('/change-password', [CustomerAuthController::class, 'edit'])->name('password.edit');
    Route::post('/change-password', [CustomerAuthController::class, 'update'])->name('passwords.update');
});
//role and permission
Route::get('/list-account',[CustomerAuthController::class,'listAccount'])->name('list.index');
Route::post('/list-account/{user}/change-role', [CustomerAuthController::class, 'changeRole'])->name('users.changeRole');
Route::get('/list-permission',[CustomerAuthController::class,'listPermission'])->name('list.permission');
Route::post('/list-permission/update', [CustomerAuthController::class, 'updatePermission'])->name('list.update');
Route::get('/permissions/create', [CustomerAuthController::class, 'create'])->name('permissions.create');
Route::post('/permissions/store', [CustomerAuthController::class, 'store'])->name('permissions.store');
Route::get('/roles/create',[CustomerAuthController::class,'createRole'])->name('roles.create');
Route::post('/roles',[CustomerAuthController::class,'storeRole'])->name('roles.store');
Route::delete('/roles/{id}', [CustomerAuthController::class, 'destroyRole'])->name('roles.destroy');

Route::get('login/forgot-password', [ForgotPassWordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('login/forgot-password', [ForgotPassWordController::class, 'sendResetLinkEmail'])->name('password.email');

// Reset Password Routes
Route::get('login/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('login/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
//Register
Route::get('/register', [CustomerAuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [CustomerAuthController::class, 'register']);


Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index')->middleware('auth');
Route::get('/admin/profile', [DashboardController::class, 'showProfile'])->name('admin.profile');

Route::get('/user', [CustomerAuthController::class, 'index'])->name('user.index');

Route::resource('/food',FoodController::class);
Route::get('/foods/search', [FoodController::class, 'searchFood'])->name('foods.search');

Route::resource('/customer',CustomerController::class);
Route::get('/customers/search', [CustomerController::class, 'searchCustomer'])->name('customers.search');

Route::get('/stores/search', [RecipeController::class, 'searchRecipe'])->name('stores.search');
Route::resource('/store', RecipeController::class);
Route::get('/stores/order', [RecipeController::class, 'showOrderForm'])->name('stores.order');
Route::get('/stores/contact', [RecipeController::class, 'showContactForm'])->name('stores.contact');
Route::get('/stores/about', [RecipeController::class, 'showAboutForm'])->name('stores.about');

Route::get('/news/product', [NewCotroller::class, 'showFormNews'])->name('news.product');
Route::get('/new/search', [NewCotroller::class, 'searchNew'])->name('new.search');
Route::resource('/news',NewCotroller::class);

Route::resource('/comment',CommentController::class);
