<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\CompanyController;

Route::get('/dashboard', [CompanyController::class, 'index'])->name('company.dashboard');
Route::get('/buy-package/{package}',[CompanyController::class, 'package'])->name('company.buy-package');
Route::get('/current-plan',[CompanyController::class, 'current_plan'])->name('company.current-plan');
Route::post('/cancel-plan/{id}',[CompanyController::class, 'cancel_plan'])->name('company.cancel-plan');