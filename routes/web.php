<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\OAuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailVerifyController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::view('register', 'auth.signup.index')->name('register.index')->middleware('guest');
Route::view('reset-password-changed', 'auth.resetpasswordreq.password-changed')->name('passwordchanged');
Route::view('forgot-password', 'auth.resetpasswordreq.index')->name('password.resetrequest');
Route::view('register-verification-email-sent', 'auth.resetpassword.email-sent')->name('register.emailsent');



Route::middleware(['auth'])->group(function () {
    Route::redirect('/', 'home');
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('update-profile', [UserController::class, 'update'])->name('user.update');
    Route::view('home', 'home.index')->name('home.index');
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');

    Route::post('session', [StripeController::class, 'session'])->name('session');
    Route::get('success', [StripeController::class, 'success'])->name('success');
    Route::get('cancel', [StripeController::class, 'cancel'])->name('cancel');

});


Route::middleware(['guest'])->group(function () {

    Route::post('register', [RegisterController::class, 'register'])->name('register')->middleware('guest');
    Route::post('login', [LoginController::class, 'login'])->name('login')->middleware('guest', 'ensure.email.verified');
    Route::get('login', [LoginController::class, 'index'])->name('login.index')->middleware('guest');




    Route::get('/email/verify/{id}/{hash}', [EmailVerifyController::class, 'emailVerify'])->name('verification.verify');
    Route::view('email/verify', 'email-sent')->name('verification.notice');


    Route::controller(PasswordResetController::class)->group(function () {
        Route::post('reset-password', 'resetPassword')->name('password.resetrequest.post');
        Route::get('reset-password/{token}', 'index')->name('password.resetform');
        Route::post('reset-password/{token}', 'changePassword')->name('password.update');
    });

});




Route::controller(OAuthController::class)->group(function () {
    Route::get('auth/google-callback', 'callbackGoogle')->name('google.callback');
});


Route::get('set-language/{language}', [LanguageController::class, 'setLanguage'])->name('set-language');
