<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PackageController;

Route::get('/package/view', [PackageController::class, 'index'])->name('admin.package');
Route::get('/package/create', [PackageController::class, 'create'])->name('admin.package-create');
Route::post('/package/store', [PackageController::class, 'store'])->name('admin.package-store');
Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('admin.package-edit');
Route::post('/package/update/{id}', [PackageController::class, 'update'])->name('admin.package-update');
Route::post('/package/delete/{id}', [PackageController::class, 'delete'])->name('admin.package-delete');
