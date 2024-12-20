<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\SalePageController;
use App\Http\Middleware\RedirectIfNotAuthenticated;

Route::get('/', [SalePageController::class, 'index'])->name('sale.index');
Route::get('/book-details/{book_id}', [SalePageController::class, 'showBookDetails'])->name('sale.showBookDetails');

Route::get('/admin', function () {
    return view('master.admin');
})->name('home.admin');

Route::group(['prefix' => 'account'], function () {

    Route::get('/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/login', [AccountController::class, 'checkLogin']);
    Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');

    Route::get('/verify-account/{email}', [AccountController::class, 'verify'])->name('account.verify');
    Route::get('/register', [AccountController::class, 'register'])->name('account.register');
    Route::post('/register', [AccountController::class, 'checkRegister']);

    Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::post('/profile', [AccountController::class, 'checkProfile']);

    Route::middleware([RedirectIfNotAuthenticated::class])->group(function () {
        Route::get('/change-password', [AccountController::class, 'changePassword'])->name('account.change-password');
        Route::post('/change-password', [AccountController::class, 'checkChangePassword']);

        Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
        Route::post('/profile', [AccountController::class, 'checkProfile']);
    });

    Route::get('/forgot-password', [AccountController::class, 'forgotPassword'])->name('account.forgot-password');
    Route::post('/forgot-password', [AccountController::class, 'checkForgotPassword']);

    Route::get('/reset-password/{token}', [AccountController::class, 'resetPassword'])->name('account.reset-password');
    Route::post('/reset-password/{token}', [AccountController::class, 'checkResetPassword']);
});

Route::group(['prefix' => 'account'], function () {
    Route::resource('book', BookController::class);
});

Route::get('/test', function () {
    return view('admin.book.index');
});

Route::get('/test1', function () {
    return view('layout.partials.Header_Employee');
});
