<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Client\UserEducationController;
use App\Http\Controllers\Client\UserSkillController;
use App\Http\Controllers\Client\UserAwardController;
use App\Http\Controllers\Client\UserWorkExperienceController;
use App\Http\Controllers\Client\UserResumeController;


Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/edit-profile', [UserController::class, 'edit_profile'])->name('user.edit-profile');
Route::post('/edit-profile-update', [UserController::class, 'edit_profile_update'])->name('user.edit-profile-update');
Route::get('/edit-password', [UserController::class, 'edit_password'])->name('user.edit-password');
Route::post('/edit-password-update', [UserController::class, 'edit_password_update'])->name('user.edit-password-update');

Route::get('/education/view', [UserEducationController::class, 'index'])->name('user.education');
Route::get('/education/create', [UserEducationController::class, 'create'])->name('user.education-create');
Route::post('/education/store', [UserEducationController::class, 'store'])->name('user.education-store');
Route::get('/education/edit/{id}', [UserEducationController::class, 'edit'])->name('user.education-edit');
Route::post('/education/update/{id}', [UserEducationController::class, 'update'])->name('user.education-update');
Route::post('/education/delete/{id}', [UserEducationController::class, 'delete'])->name('user.education-delete');

Route::get('/skill/view', [UserSkillController::class, 'index'])->name('user.skill');
Route::get('/skill/create', [UserSkillController::class, 'create'])->name('user.skill-create');
Route::post('/skill/store', [UserSkillController::class, 'store'])->name('user.skill-store');
Route::get('/skill/edit/{id}', [UserSkillController::class, 'edit'])->name('user.skill-edit');
Route::post('/skill/update/{id}', [UserSkillController::class, 'update'])->name('user.skill-update');
Route::post('/skill/delete/{id}', [UserSkillController::class, 'delete'])->name('user.skill-delete');

Route::get('/work-experience/view', [UserWorkExperienceController::class, 'index'])->name('user.work-experience');
Route::get('/work-experience/create', [UserWorkExperienceController::class, 'create'])->name('user.work-experience-create');
Route::post('/work-experience/store', [UserWorkExperienceController::class, 'store'])->name('user.work-experience-store');
Route::get('/work-experience/edit/{id}', [UserWorkExperienceController::class, 'edit'])->name('user.work-experience-edit');
Route::post('/work-experience/update/{id}', [UserWorkExperienceController::class, 'update'])->name('user.work-experience-update');
Route::post('/work-experience/delete/{id}', [UserWorkExperienceController::class, 'delete'])->name('user.work-experience-delete');

Route::get('/award/view', [UserAwardController::class, 'index'])->name('user.award');
Route::get('/award/create', [UserAwardController::class, 'create'])->name('user.award-create');
Route::post('/award/store', [UserAwardController::class, 'store'])->name('user.award-store');
Route::get('/award/edit/{id}', [UserAwardController::class, 'edit'])->name('user.award-edit');
Route::post('/award/update/{id}', [UserAwardController::class, 'update'])->name('user.award-update');
Route::post('/award/delete/{id}', [UserAwardController::class, 'delete'])->name('user.award-delete');

Route::get('/resume/view', [UserResumeController::class, 'index'])->name('user.resume');
Route::get('/resume/create', [UserResumeController::class, 'create'])->name('user.resume-create');
Route::post('/resume/store', [UserResumeController::class, 'store'])->name('user.resume-store');
Route::get('/resume/edit/{id}', [UserResumeController::class, 'edit'])->name('user.resume-edit');
Route::post('/resume/update/{id}', [UserResumeController::class, 'update'])->name('user.resume-update');
Route::post('/resume/delete/{id}', [UserResumeController::class, 'delete'])->name('user.resume-delete');