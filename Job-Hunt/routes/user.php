<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\UserController;

Route::get('/dashboard', [UserController::class, 'index'])->name('user.dashboard');