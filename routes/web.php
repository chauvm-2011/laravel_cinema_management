<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\LoginController;
use \App\Http\Controllers\Admin\HomeController;
use \App\Http\Controllers\Admin\RegisterController;
use \App\Http\Controllers\Admin\ListCategoryController;
use \App\Http\Controllers\Admin\AddCategoryController;
use \App\Http\Controllers\Admin\UpdateCategoryController;
use \App\Http\Controllers\Admin\ListMovieController;
use \App\Http\Controllers\Admin\AddMovieController;
use \App\Http\Controllers\Admin\UploadController;
use \App\Http\Controllers\Admin\DetailMovieController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister']);

Route::middleware(['checklogin'])->group(function () {
    Route::get('home', [HomeController::class, 'showHomeForm'])->name('home');
    Route::get('add_category', [AddCategoryController::class, 'showAddCategoryForm'])->name('add_category');
    Route::post('add_category', [AddCategoryController::class, 'postAddCategory']);
    Route::get('list_category', [ListCategoryController::class, 'showListCategoryForm'])->name('list_category');
    Route::get('update_category/{category}', [UpdateCategoryController::class, 'showUpdateCategoryForm']);
    Route::post('update_category/{category}', [UpdateCategoryController::class, 'update']);
    Route::delete('delete_category', [ListCategoryController::class, 'destroy']);
    Route::get('list_movie', [ListMovieController::class, 'showListMovieForm'])->name('list_movie');
    Route::get('add_movie', [AddMovieController::class, 'showAddMovieForm']);
    Route::post('add_movie', [AddMovieController::class, 'postAddMovie']);
    Route::post('upload', [UploadController::class, 'store']);
    Route::get('detail_movie/{movie}', [DetailMovieController::class, 'showDetailMovieForm']);
});
