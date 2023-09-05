<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminCompanyController;
use App\Http\Controllers\Admin\AdminUserController;

Route::get('/index', [AdminHomeController::class, 'index'])->name('admin.index');
Route::get('/edit-profile', [AdminHomeController::class, 'edit_profile'])->name('admin.edit-profile');
Route::post('/edit-profile-submit', [AdminHomeController::class, 'profile_submit'])->name('admin.profile-submit');
Route::get('/home-page', [AdminHomeController::class, 'home_page'])->name('admin.home-page');
Route::post('/home-page/update', [AdminHomeController::class, 'home_page_update'])->name('admin.home-page-update');
Route::get('/all-subscribers', [AdminHomeController::class, 'all_subscribers'])->name('admin.all-subscribers');
Route::get('/subscribers-send-email', [AdminHomeController::class, 'send_email'])->name('admin.subscribers-send-email');
Route::post('/subscribers-send-email-submit', [AdminHomeController::class, 'send_email_submit'])->name('admin.subscribers-send-email-submit');
Route::post('/subscriber-delete/{id}', [AdminHomeController::class, 'delete'])->name('admin.subscriber-delete');

Route::get('/companies', [AdminCompanyController::class, 'index'])->name('admin.companies');
Route::get('/companies-details/{id}', [AdminCompanyController::class, 'companies_details'])->name('admin.companies-details');
Route::get('/companies-jobs/{id}', [AdminCompanyController::class, 'companies_jobs'])->name('admin.companies-jobs');
Route::get('/companies-applicants/{id}', [AdminCompanyController::class, 'companies_applicants'])->name('admin.companies-applicants');
Route::get('/companies-applicant-resume/{id}', [AdminCompanyController::class, 'companies_applicant_resume'])->name('admin.companies-applicant-resume');
Route::post('/companies-delete/{id}', [AdminCompanyController::class, 'delete'])->name('admin.companies-delete');

Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users');
Route::get('/user-details/{id}', [AdminUserController::class, 'user_details'])->name('admin.user-details');
Route::get('/user-applied-jobs/{id}', [AdminUserController::class, 'user_applied_jobs'])->name('admin.user-applied-jobs');
Route::post('/user-delete/{id}', [AdminUserController::class, 'delete'])->name('admin.user-delete');