<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/index', [AdminHomeController::class, 'index'])->name('admin.index')->middleware('admin:admin');
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin.login-submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin.forget-password');
    Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])->name('admin.forget-password-submit');
    Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])->name('admin.reset-password');
    Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])->name('admin.reset-password-submit');
    Route::get('/edit-profile', [AdminHomeController::class, 'edit_profile'])->name('admin.edit-profile')->middleware('admin:admin');
    Route::post('/edit-profile-submit', [AdminHomeController::class, 'profile_submit'])->name('admin.profile-submit');
});