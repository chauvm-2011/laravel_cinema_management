<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\RegisterController;
use \App\Http\Controllers\Admin\ListCategoryController;
use \App\Http\Controllers\Admin\AddCategoryController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister']);

Route::middleware(['checklogin'])->group(function () {
    Route::get('home', [HomeController::class, 'showHomeForm'])->name('home');
    Route::get('add_category', [AddCategoryController::class, 'showAddCategoryForm'])->name('add_category');
    Route::post('add_category', [AddCategoryController::class, 'postAddCategory']);
    Route::get('list_category', [ListCategoryController::class, 'showListCategoryForm'])->name('list_category');
});
