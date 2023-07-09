<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TermPageController;
use App\Http\Controllers\Admin\PrivacyPageController;
use App\Http\Controllers\Admin\ContactPageController;

Route::get('/why-choose-us/view', [WhyChooseController::class, 'index'])->name('admin.why-choose-us');
Route::get('/why-choose-us/create', [WhyChooseController::class, 'create'])->name('admin.why-choose-us-create');
Route::post('/why-choose-us/store', [WhyChooseController::class, 'store'])->name('admin.why-choose-us-store');
Route::get('/why-choose-us/edit/{id}', [WhyChooseController::class, 'edit'])->name('admin.why-choose-us-edit');
Route::post('/why-choose-us/update/{id}', [WhyChooseController::class, 'update'])->name('admin.why-choose-us-update');
Route::post('/why-choose-us/delete/{id}', [WhyChooseController::class, 'delete'])->name('admin.why-choose-us-delete');

Route::get('/testimonial/view', [TestimonialController::class, 'index'])->name('admin.testimonial');
Route::get('/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial-create');
Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial-store');
Route::get('/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial-edit');
Route::post('/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial-update');
Route::post('/testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('admin.testimonial-delete');

Route::get('/term-page', [TermPageController::class, 'index'])->name('admin.term-page');
Route::post('/term-page/update', [TermPageController::class, 'update'])->name('admin.term-page-update');

Route::get('/privacy-page', [PrivacyPageController::class, 'index'])->name('admin.privacy-page');
Route::post('/privacy-page/update', [PrivacyPageController::class, 'update'])->name('admin.privacy-page-update');

Route::get('/contact-page', [ContactPageController::class, 'index'])->name('admin.contact-page');
Route::post('/contact-page/update', [ContactPageController::class, 'update'])->name('admin.contact-page-update');