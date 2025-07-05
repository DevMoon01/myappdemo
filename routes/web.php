<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgetPasswordManager;
use App\Http\Controllers\PostController;

Route::middleware("auth")->group(function () {


    // Route for the home page
    Route::view("/", 'welcome')
        ->name('home');
});





// Route for registration page
Route::get("/register", [AuthController::class, "register"])
    ->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');



// Route for login page
Route::get("/login", [AuthController::class, "login"])
    ->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');


Route::get('/views', [PostController::class, 'viewsPosts'])
    ->name('views.show');

Route::post('/views', [PostController::class, 'store'])
    ->name('views.show');

Route::delete('/views/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/views', [PostController::class, 'myPosts'])->name('posts.my');



Route::post('/logout', [AuthController::class, 'logoutPost'])->name('logout.post');




Route::get('/forget-password', [ForgetPasswordManager::class, 'forgetPassword'])
    ->name('forget.password');

Route::post('/forget-password', [ForgetPasswordManager::class, 'forgetPasswordPost'])
    ->name('forget.password.post');
Route::get('/reset-password/{token}', [ForgetPasswordManager::class, 'resetPassword'])
    ->name('reset.password');
Route::post('/reset-password', [ForgetPasswordManager::class, 'resetPasswordPost'])->name('reset.password.post');
