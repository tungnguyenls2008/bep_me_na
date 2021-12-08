<?php

use Illuminate\Support\Facades\Route;

Route::get('/backend', function () {
    return view('backend.welcome');
});
//===================BACKEND AUTH ROUTES===============================
Route::get('backend/login', [\App\Http\Controllers\Controllers_be\Auth\LoginController::class, 'showLoginForm'])->name('backend-login-view');
Route::post('backend/login', [\App\Http\Controllers\Controllers_be\Auth\LoginController::class,'login'])->name('backend-login');
Route::post('backend/logout',  [\App\Http\Controllers\Controllers_be\Auth\LoginController::class,'logout'])->name('backend-logout');

// Registration Routes...
Route::get('backend/register', [\App\Http\Controllers\Controllers_be\Auth\RegisterController::class, 'showRegistrationForm'])->name('backend-register');
Route::post('backend/register', [\App\Http\Controllers\Controllers_be\Auth\RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('backend/password/reset', [\App\Http\Controllers\Controllers_be\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('backend-password.request');
Route::post('backend/password/email', [\App\Http\Controllers\Controllers_be\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('backend-password.email');
Route::get('backend/password/reset/{token}', [\App\Http\Controllers\Controllers_be\Auth\ForgotPasswordController::class, 'showResetForm'])->name('backend-password.reset');
Route::post('backend/password/reset', [\App\Http\Controllers\Controllers_be\Auth\ForgotPasswordController::class, 'reset'])->name('backend-password.update');

// Confirm Password
Route::get('backend/password/confirm', [\App\Http\Controllers\Controllers_be\Auth\ConfirmPasswordController::class, 'showConfirmForm'])->name('backend-password.confirm');
Route::post('backend/password/confirm', [\App\Http\Controllers\Controllers_be\Auth\ConfirmPasswordController::class, 'backend-confirm']);

// Email Verification Routes...
Route::get('backend/email/verify', [\App\Http\Controllers\Controllers_be\Auth\VerificationController::class, 'show'])->name('backend-verification.notice');
Route::get('backend/email/verify/{id}/{hash}', [\App\Http\Controllers\Controllers_be\Auth\VerificationController::class, 'verify'])->name('backend-verification.verify');
Route::get('backend/email/resend',  [\App\Http\Controllers\Controllers_be\Auth\VerificationController::class, 'resend'])->name('backend-verification.resend');

//================================END======================================
Route::middleware(['backend'])->prefix('backend')->group(function () {
    Route::get('home',[\App\Http\Controllers\Controllers_be\HomeController::class,'index'])->name('backend-home');
    Route::resource('organizations', \App\Http\Controllers\Controllers_be\OrganizationController::class);
    Route::resource('ceos', \App\Http\Controllers\Controllers_be\CeoController::class);
    Route::resource('industries', \App\Http\Controllers\Controllers_be\IndustryController::class);
    Route::resource('products', \App\Http\Controllers\Controllers_be\ProductController::class);
    Route::resource('profiles', \App\Http\Controllers\Controllers_be\ProfileController::class);
});


