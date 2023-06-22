<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function(){
    return view('home');
})->name('home');

Route::group(['prefix'=>'authentication'], function(){
     Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('authentication.dashboard')->middleware('auth');

     Route::get('/login', [AuthController::class, 'login'])->name('authentication.login');
     Route::post('/login_submit', [AuthController::class, 'login_submit'])->name('authentication.login_submit');
     Route::get('/logout', [AuthController::class, 'logout'])->name('authentication.logout');

     Route::get('/registration', [AuthController::class, 'registration'])->name('authentication.registration');
     Route::post('/registration_submit', [AuthController::class, 'registration_submit'])->name('authentication.registration_submit');
     Route::get('/registration/verify/{token}/{email}', [AuthController::class, 'registration_verify']);

     Route::get('/forget-password', [AuthController::class, 'forget_password'])->name('authentication.forget_password');
     Route::post('/forget-password-submit', [AuthController::class, 'forget_password_submit'])->name('authentication.forget-password-submit');
     Route::get('/reset-password/{token}/{email}', [AuthController::class, 'reset_password'])->name('authentication.reset-password');
     Route::post('/reset-password-submit', [AuthController::class, 'reset_password_submit'])->name('authentication.reset-password-submit');
});


Route::group(['prefix' =>'admin'], function(){
     Route::get('/login', [AdminController::class, 'login'])->name('admin.login');
     Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin.login_submit');

     Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin:admin');
     Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings')->middleware('admin:admin');
     Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

});