<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\RegisterController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister']);

Route::middleware(['checklogin'])->group(function () {
    Route::get('home', [HomeController::class, 'showHomeForm'])->name('home');
});
