<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::group([
    'prefix' => 'auth'
], function() {
    Route::middleware('guest')->group(function() {
        Route::get('login', [\App\Http\Controllers\Auth\LoginController::class, 'loginForm'])->name('loginForm');
        Route::post('login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

        Route::get('register', [\App\Http\Controllers\Auth\RegisterController::class, 'registerForm'])->name('registerForm');
        Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
    });

    Route::middleware('auth')->group(function() {
        Route::get('email/verify', [\App\Http\Controllers\Auth\VerificationController::class, 'notice'])->name('verification.notice');
        Route::post('email/verification-notification', [\App\Http\Controllers\Auth\VerificationController::class, 'resend'])->name('verification.resend');
        Route::get('email/verify/{id}/{hash}', [\App\Http\Controllers\Auth\VerificationController::class, 'verify'])->name('verification.verify');


        Route::get('logout', [\App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');
    });

    Route::middleware('verified')->group(function() {

    });
});
