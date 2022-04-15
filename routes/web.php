<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
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
use \App\Http\Controllers\Admin\UpdateMovieController;
use \App\Http\Controllers\User\MainController;
use \App\Http\Controllers\Admin\ListMovieScheduleController;
use \App\Http\Controllers\Admin\AddMovieScheduleController;
use \App\Http\Controllers\Admin\DetailMovieScheduleController;
use \App\Http\Controllers\Admin\UpdateMovieScheduleController;
use \App\Http\Controllers\User\ListMovieUserController;
use \App\Http\Controllers\User\MainLoginController;
use \App\Http\Controllers\User\ListMovieUserLoginController;
use \App\Http\Controllers\User\DetailMovieUserController;
use \App\Http\Controllers\User\BookMovieTicketController;
use \App\Http\Controllers\User\PaymentController;
use \App\Http\Controllers\User\DetailMovieUserLoginController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'postRegister']);

Route::get('accept-user/{user}/{token}', [RegisterController::class, 'accept'])->name('user.accept');
Route::get('accept-user/{user}/{token}', [LoginController::class, 'accept'])->name('user.accept');

Route::middleware(['checklogin'])->group(function () {
    Route::middleware(['checkrole'])->group(function () {
        Route::get('home', [HomeController::class, 'showHomeForm'])->name('home');
        Route::get('home-month-statistic', [HomeController::class, 'monthlyRevenueStatistics']);
        Route::post('home-day-statistic', [HomeController::class, 'dayRevenueStatistics']);
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
        Route::get('update_movie/{movie}', [UpdateMovieController::class, 'updateMovieForm']);
        Route::post('update_movie/{movie}', [UpdateMovieController::class, 'updateMovie']);
        Route::delete('delete_movie', [ListMovieController::class, 'destroy']);
        Route::get('list_movie_schedule', [ListMovieScheduleController::class, 'listMovieSchedule'])->name('list_movie_schedule');
        Route::post('list_movie_schedule', [ListMovieScheduleController::class, 'postListMovieSchedule']);
        Route::get('add_movie_schedule', [AddMovieScheduleController::class, 'addMovieScheduleForm'])->name('add_movie_schedule');
        Route::post('add_movie_schedule', [AddMovieScheduleController::class, 'postAddMovieSchedule']);
        Route::get('detail_movie_schedule/{movie_schedule}', [DetailMovieScheduleController::class, 'detailMovieScheduleForm']);
        Route::get('update_movie_schedule/{movie_schedule}', [UpdateMovieScheduleController::class, 'updateMovieScheduleForm'])->name('update_movie_schedule');
        Route::post('update_movie_schedule/{movie_schedule}', [UpdateMovieScheduleController::class, 'updateMovieSchedule']);
        Route::delete('delete_movie_schedule', [ListMovieScheduleController::class, 'destroy']);
        Route::get('logout', [HomeController::class, 'logout']);
    });
});

Route::middleware('cors')->group(function () {
    Route::get('main', [MainController::class, 'showMainUserForm'])->name('main');
    Route::get('list-movie-user', [ListMovieUserController::class, 'listMovieUser'])->name('list-movie-user');
    Route::get('detail-movie-user/{movie}', [DetailMovieUserController::class, 'detailMovieUser'])->name('detail-movie-user');
    Route::get('payment-vnpay-return', [PaymentController::class, 'vnpReturn']);
    Route::middleware('checklogin')->group(function () {
        Route::get('main-login', [MainLoginController::class, 'mainLoginUser'])->name('main-login');
        Route::get('signout', [MainLoginController::class, 'signout']);
        Route::get('list-movie-user-login', [ListMovieUserLoginController::class, 'listMovieUserLogin'])->name('list-movie-user-login');
        Route::get('detail-movie-user-login/{movie}', [DetailMovieUserLoginController::class, 'detailMovieUserLogin'])->name('detail-movie-user-login');
        Route::get('book-movie-ticket/{movie}', [BookMovieTicketController::class, 'bookMovieTicket']);
        Route::get('book-movie-ticket-date/{movie}', [BookMovieTicketController::class, 'getTime']);
        Route::get('book-movie-ticket-seat/{movie_schedule_id}', [BookMovieTicketController::class, 'getSeat']);
        Route::get('payment-vnpay', [PaymentController::class, 'showPaymentForm']);
        Route::post('payment-vnpay-bill', [PaymentController::class, 'paymentVNPay']);
    });
});

