<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;

Route::get('/index', [AdminHomeController::class, 'index'])->name('admin.index');
Route::get('/edit-profile', [AdminHomeController::class, 'edit_profile'])->name('admin.edit-profile');
Route::post('/edit-profile-submit', [AdminHomeController::class, 'profile_submit'])->name('admin.profile-submit');
Route::get('/home-page', [AdminHomeController::class, 'home_page'])->name('admin.home-page');
Route::post('/home-page/update', [AdminHomeController::class, 'home_page_update'])->name('admin.home-page-update');