<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\JobListingController;
use App\Http\Controllers\Client\CompanyListingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact-submit');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/job-categories', [HomeController::class, 'job_categories'])->name('job-categories');
Route::get('/job-listing', [JobListingController::class, 'index'])->name('job-listing');
Route::get('/job/{id}', [JobListingController::class, 'detail'])->name('job');
Route::post('job-enquery/email', [JobListingController::class, 'send_email'])->name('job_enquery_send_email');
Route::get('/company-listing', [CompanyListingController::class, 'index'])->name('company-listing');
Route::get('/companylisting/{id}', [CompanyListingController::class, 'detail'])->name('companylisting');
Route::post('/company-enquery/email', [CompanyListingController::class, 'send_email'])->name('company_enquery_send_email');
Route::post('/subscriber_send_email', [HomeController::class, 'send_email'])->name('subscriber_send_email');
Route::get('/subscriber/verify/{email}/{token}', [HomeController::class, 'verify'])->name('subscriber-email-verify');
