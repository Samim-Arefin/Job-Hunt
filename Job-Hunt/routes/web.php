<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\JobCategoryController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');

Route::group(['prefix' => 'admin'], function(){
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin.login-submit');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/forget-password', [AdminController::class, 'forget_password'])->name('admin.forget-password');
    Route::post('/forget-password-submit', [AdminController::class, 'forget_password_submit'])->name('admin.forget-password-submit');
    Route::get('/reset-password/{token}/{email}', [AdminController::class, 'reset_password'])->name('admin.reset-password');
    Route::post('/reset-password-submit', [AdminController::class, 'reset_password_submit'])->name('admin.reset-password-submit');
    Route::post('/edit-profile-submit', [AdminHomeController::class, 'profile_submit'])->name('admin.profile-submit');
});

Route::middleware(['admin:admin'])->group(function(){
    Route::get('/admin/index', [AdminHomeController::class, 'index'])->name('admin.index');
    Route::get('/admin/edit-profile', [AdminHomeController::class, 'edit_profile'])->name('admin.edit-profile');
    Route::get('/admin/home-page', [AdminHomeController::class, 'home_page'])->name('admin.home-page');
    Route::post('/admin/home-page/update', [AdminHomeController::class, 'home_page_update'])->name('admin.home-page-update');

    Route::get('/admin/job-category', [JobCategoryController::class, 'index'])->name('admin.job-category');
    Route::get('/admin/job-category/create', [JobCategoryController::class, 'create'])->name('admin.job-category-create');
    Route::post('/admin/job-category/store', [JobCategoryController::class, 'store'])->name('admin.job-category-store');
    Route::get('/admin/job-category/edit/{id}', [JobCategoryController::class, 'edit'])->name('admin.job-category-edit');
    Route::post('/admin/job-category/update/{id}', [JobCategoryController::class, 'update'])->name('admin.job-category-update');
    Route::post('/admin/job-category/delete/{id}', [JobCategoryController::class, 'delete'])->name('admin.job-category-delete');
});