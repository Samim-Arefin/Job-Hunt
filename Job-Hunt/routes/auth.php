<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\AuthController;

Route::get('/user-signup', [AuthController::class, 'user_signup'])->name('auth.user-signup');
Route::get('/user-login', [AuthController::class, 'user_login'])->name('auth.user-login');
Route::post('/user-signup-submit', [AuthController::class, 'user_signup_submit'])->name('auth.user-signup-submit');
Route::post('/user-login-submit', [AuthController::class, 'user_login_submit'])->name('auth.user-login-submit');
Route::post('/user-signup-submit', [AuthController::class, 'user_signup_submit'])->name('auth.user-signup-submit');
Route::get('/user/registration/verify/{token}/{email}', [AuthController::class, 'user_registration_verify'])->name('auth.user-registration-verify');
Route::post('/user-login-submit', [AuthController::class, 'user_login_submit'])->name('auth.user-login-submit');
Route::get('/user-forget-password', [AuthController::class, 'user_forget_password'])->name('auth.user-forget-password');
Route::post('/user-forget-password-submit', [AuthController::class, 'user_forget_password_submit'])->name('auth.user-forget-password-submit');
Route::get('/user/reset-password/{token}/{email}', [AuthController::class, 'user_reset_password'])->name('auth.user-reset-password');
Route::post('/user-reset-password-submit', [AuthController::class, 'user_reset_password_submit'])->name('auth.user-reset-password-submit');
Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('auth.user-logout');

Route::get('/company-signup', [AuthController::class, 'company_signup'])->name('auth.company-signup');
Route::get('/company-login', [AuthController::class, 'company_login'])->name('auth.company-login');
Route::post('/company-signup-submit', [AuthController::class, 'company_signup_submit'])->name('auth.company-signup-submit');
Route::get('/company/registration/verify/{token}/{email}', [AuthController::class, 'company_registration_verify'])->name('auth.company-registration-verify');
Route::post('/company-login-submit', [AuthController::class, 'company_login_submit'])->name('auth.company-login-submit');
Route::get('/company-forget-password', [AuthController::class, 'company_forget_password'])->name('auth.company-forget-password');
Route::post('/company-forget-password-submit', [AuthController::class, 'company_forget_password_submit'])->name('auth.company-forget-password-submit');
Route::get('/company/reset-password/{token}/{email}', [AuthController::class, 'company_reset_password'])->name('auth.company-reset-password');
Route::post('/company-reset-password-submit', [AuthController::class, 'company_reset_password_submit'])->name('auth.company-reset-password-submit');
Route::get('/company-logout', [AuthController::class, 'company_logout'])->name('auth.company-logout');