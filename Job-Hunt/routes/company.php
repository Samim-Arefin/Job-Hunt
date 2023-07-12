<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CompanyController;

Route::get('/dashboard', [CompanyController::class, 'index'])->name('company.dashboard');
Route::get('/buy-package/{package}', [CompanyController::class, 'package'])->name('company.buy-package');
Route::get('/current-plan', [CompanyController::class, 'current_plan'])->name('company.current-plan');
Route::post('/cancel-plan/{id}',[CompanyController::class, 'cancel_plan'])->name('company.cancel-plan');
Route::get('/edit-profile', [CompanyController::class, 'edit_profile'])->name('company.edit-profile');
Route::post('/edit-profile-submit', [CompanyController::class, 'edit_profile_submit'])->name('company.edit-profile-submit');
Route::get('/edit-password', [CompanyController::class, 'edit_password'])->name('company.edit-password');
Route::post('/edit-password-submit', [CompanyController::class, 'edit_password_submit'])->name('company.edit-password-submit');
Route::get('/photos', [CompanyController::class, 'photos'])->name('company.photos');
Route::post('/photo-submit', [CompanyController::class, 'photo_submit'])->name('company.photo-submit');
Route::post('/photo-delete/{id}', [CompanyController::class, 'photo_delete'])->name('company.photo-delete');