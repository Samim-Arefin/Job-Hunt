<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin.login-submit');
Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin.forget-password');
Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])->name('admin.forget-password-submit');
Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])->name('admin.reset-password');
Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])->name('admin.reset-password-submit');
