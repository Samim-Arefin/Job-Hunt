<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\JobTypeController;
use App\Http\Controllers\Admin\JobLocationController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobExperienceController;
use App\Http\Controllers\Admin\JobGenderController;
use App\Http\Controllers\Admin\JobSalaryRangeController;
use App\Http\Controllers\Admin\CompanyIndustryController;
use App\Http\Controllers\Admin\CompanySizeController;
use App\Http\Controllers\Admin\CompanyLocationController;

Route::get('/job-type/view', [JobTypeController::class, 'index'])->name('admin.job-type');
Route::get('/job-type/create', [JobTypeController::class, 'create'])->name('admin.job-type-create');
Route::post('/job-type/store', [JobTypeController::class, 'store'])->name('admin.job-type-store');
Route::get('/job-type/edit/{id}', [JobTypeController::class, 'edit'])->name('admin.job-type-edit');
Route::post('/job-type/update/{id}', [JobTypeController::class, 'update'])->name('admin.job-type-update');
Route::post('/job-type/delete/{id}', [JobTypeController::class, 'delete'])->name('admin.job-type-delete');

Route::get('/job-location/view', [JobLocationController::class, 'index'])->name('admin.job-location');
Route::get('/job-location/create', [JobLocationController::class, 'create'])->name('admin.job-location-create');
Route::post('/job-location/store', [JobLocationController::class, 'store'])->name('admin.job-location-store');
Route::get('/job-location/edit/{id}', [JobLocationController::class, 'edit'])->name('admin.job-location-edit');
Route::post('/job-location/update/{id}', [JobLocationController::class, 'update'])->name('admin.job-location-update');
Route::post('/job-location/delete/{id}', [JobLocationController::class, 'delete'])->name('admin.job-location-delete');

Route::get('/job-category/view', [JobCategoryController::class, 'index'])->name('admin.job-category');
Route::get('/job-category/create', [JobCategoryController::class, 'create'])->name('admin.job-category-create');
Route::post('/job-category/store', [JobCategoryController::class, 'store'])->name('admin.job-category-store');
Route::get('/job-category/edit/{id}', [JobCategoryController::class, 'edit'])->name('admin.job-category-edit');
Route::post('/job-category/update/{id}', [JobCategoryController::class, 'update'])->name('admin.job-category-update');
Route::post('/job-category/delete/{id}', [JobCategoryController::class, 'delete'])->name('admin.job-category-delete');

Route::get('/job-experience/view', [JobExperienceController::class, 'index'])->name('admin.job-experience');
Route::get('/job-experience/create', [JobExperienceController::class, 'create'])->name('admin.job-experience-create');
Route::post('/job-experience/store', [JobExperienceController::class, 'store'])->name('admin.job-experience-store');
Route::get('/job-experience/edit/{id}', [JobExperienceController::class, 'edit'])->name('admin.job-experience-edit');
Route::post('/job-experience/update/{id}', [JobExperienceController::class, 'update'])->name('admin.job-experience-update');
Route::post('/job-experience/delete/{id}', [JobExperienceController::class, 'delete'])->name('admin.job-experience-delete');

Route::get('/job-gender/view', [JobGenderController::class, 'index'])->name('admin.job-gender');
Route::get('/job-gender/create', [JobGenderController::class, 'create'])->name('admin.job-gender-create');
Route::post('/job-gender/store', [JobGenderController::class, 'store'])->name('admin.job-gender-store');
Route::get('/job-gender/edit/{id}', [JobGenderController::class, 'edit'])->name('admin.job-gender-edit');
Route::post('/job-gender/update/{id}', [JobGenderController::class, 'update'])->name('admin.job-gender-update');
Route::post('/job-gender/delete/{id}', [JobGenderController::class, 'delete'])->name('admin.job-gender-delete');

Route::get('/job-salary-range/view', [JobSalaryRangeController::class, 'index'])->name('admin.job-salary-range');
Route::get('/job-salary-range/create', [JobSalaryRangeController::class, 'create'])->name('admin.job-salary-range-create');
Route::post('/job-salary-range/store', [JobSalaryRangeController::class, 'store'])->name('admin.job-salary-range-store');
Route::get('/job-salary-range/edit/{id}', [JobSalaryRangeController::class, 'edit'])->name('admin.job-salary-range-edit');
Route::post('/job-salary-range/update/{id}', [JobSalaryRangeController::class, 'update'])->name('admin.job-salary-range-update');
Route::post('/job-salary-range/delete/{id}', [JobSalaryRangeController::class, 'delete'])->name('admin.job-salary-range-delete');

Route::get('/company-location/view', [CompanyLocationController::class, 'index'])->name('admin.company-location');
Route::get('/company-location/create', [CompanyLocationController::class, 'create'])->name('admin.company-location-create');
Route::post('/company-location/store', [CompanyLocationController::class, 'store'])->name('admin.company-location-store');
Route::get('/company-location/edit/{id}', [CompanyLocationController::class, 'edit'])->name('admin.company-location-edit');
Route::post('/company-location/update/{id}', [CompanyLocationController::class, 'update'])->name('admin.company-location-update');
Route::post('/company-location/delete/{id}', [CompanyLocationController::class, 'delete'])->name('admin.company-location-delete');

Route::get('/company-industry/view', [CompanyIndustryController::class, 'index'])->name('admin.company-industry');
Route::get('/company-industry/create', [CompanyIndustryController::class, 'create'])->name('admin.company-industry-create');
Route::post('/company-industry/store', [CompanyIndustryController::class, 'store'])->name('admin.company-industry-store');
Route::get('/company-industry/edit/{id}', [CompanyIndustryController::class, 'edit'])->name('admin.company-industry-edit');
Route::post('/company-industry/update/{id}', [CompanyIndustryController::class, 'update'])->name('admin.company-industry-update');
Route::post('/company-industry/delete/{id}', [CompanyIndustryController::class, 'delete'])->name('admin.company-industry-delete');

Route::get('/company-size/view', [CompanySizeController::class, 'index'])->name('admin.company-size');
Route::get('/company-size/create', [CompanySizeController::class, 'create'])->name('admin.company-size-create');
Route::post('/company-size/store', [CompanySizeController::class, 'store'])->name('admin.company-size-store');
Route::get('/company-size/edit/{id}', [CompanySizeController::class, 'edit'])->name('admin.company-size-edit');
Route::post('/company-size/update/{id}', [CompanySizeController::class, 'update'])->name('admin.company-size-update');
Route::post('/company-size/delete/{id}', [CompanySizeController::class, 'delete'])->name('admin.company-size-delete');