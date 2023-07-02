<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\WhyChooseController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TermPageController;
use App\Http\Controllers\Admin\PrivacyPageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ContactController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\CompanyController;
use App\Http\Controllers\Client\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/terms', [HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [HomeController::class, 'privacy'])->name('privacy');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-submit', [ContactController::class, 'store'])->name('contact-submit');
Route::get('/pricing', [HomeController::class, 'pricing'])->name('pricing');
Route::get('/job-categories', [HomeController::class, 'job_categories'])->name('job-categories');

Route::group(['prefix' => 'auth'], function(){
   
    Route::get('/user-signup', [AuthController::class, 'user_signup'])->name('auth.user-signup');
    Route::get('/user-login', [AuthController::class, 'user_login'])->name('auth.user-login');
    Route::post('/user-signup-submit', [AuthController::class, 'user_signup_submit'])->name('auth.user-signup-submit');
    Route::post('/user-login-submit', [AuthController::class, 'user_login_submit'])->name('auth.user-login-submit');
    Route::post('/user-signup-submit', [AuthController::class, 'user_signup_submit'])->name('auth.user-signup-submit');
    Route::get('/user/registration/verify/{token}/{email}', [AuthController::class, 'user_registration_verify'])->name('auth.user-registration-verify');
    Route::post('/user-login-submit', [AuthController::class, 'user_login_submit'])->name('auth.user-login-submit');
    Route::get('/user-forget-password', [AuthController::class, 'user_forget_password'])->name('auth.user-forget-password');
    Route::post('/user-forget-password-submit', [AuthController::class, 'user_forget_password_submit'])->name('auth.user-forget-password-submit');
    Route::get('/user/reset-password/{token}/{email}', [AuthController::class, 'user_reset_password'])->name('auth.user-reset-password');
    Route::post('/user-reset-password-submit', [AuthController::class, 'user_reset_password_submit'])->name('auth.user-reset-password-submit');
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('auth.user-logout');

    Route::get('/company-signup', [AuthController::class, 'company_signup'])->name('auth.company-signup');
    Route::get('/company-login', [AuthController::class, 'company_login'])->name('auth.company-login');
    Route::post('/company-signup-submit', [AuthController::class, 'company_signup_submit'])->name('auth.company-signup-submit');
    Route::get('/company/registration/verify/{token}/{email}', [AuthController::class, 'company_registration_verify'])->name('auth.company-registration-verify');
    Route::post('/company-login-submit', [AuthController::class, 'company_login_submit'])->name('auth.company-login-submit');
    Route::get('/company-forget-password', [AuthController::class, 'company_forget_password'])->name('auth.company-forget-password');
    Route::post('/company-forget-password-submit', [AuthController::class, 'company_forget_password_submit'])->name('auth.company-forget-password-submit');
    Route::get('/company/reset-password/{token}/{email}', [AuthController::class, 'company_reset_password'])->name('auth.company-reset-password');
    Route::post('/company-reset-password-submit', [AuthController::class, 'company_reset_password_submit'])->name('auth.company-reset-password-submit');
    Route::get('/company-logout', [AuthController::class, 'company_logout'])->name('auth.company-logout');
    
});



Route::middleware(['company:company'])->group(function(){
    Route::get('/company/dashboard', [CompanyController::class, 'index'])->name('company.dashboard');
});

Route::middleware(['user:user'])->group(function(){
    Route::get('/user/dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

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

    Route::get('/admin/job-category/view', [JobCategoryController::class, 'index'])->name('admin.job-category');
    Route::get('/admin/job-category/create', [JobCategoryController::class, 'create'])->name('admin.job-category-create');
    Route::post('/admin/job-category/store', [JobCategoryController::class, 'store'])->name('admin.job-category-store');
    Route::get('/admin/job-category/edit/{id}', [JobCategoryController::class, 'edit'])->name('admin.job-category-edit');
    Route::post('/admin/job-category/update/{id}', [JobCategoryController::class, 'update'])->name('admin.job-category-update');
    Route::post('/admin/job-category/delete/{id}', [JobCategoryController::class, 'delete'])->name('admin.job-category-delete');

    Route::get('/admin/why-choose-us/view', [WhyChooseController::class, 'index'])->name('admin.why-choose-us');
    Route::get('/admin/why-choose-us/create', [WhyChooseController::class, 'create'])->name('admin.why-choose-us-create');
    Route::post('/admin/why-choose-us/store', [WhyChooseController::class, 'store'])->name('admin.why-choose-us-store');
    Route::get('/admin/why-choose-us/edit/{id}', [WhyChooseController::class, 'edit'])->name('admin.why-choose-us-edit');
    Route::post('/admin/why-choose-us/update/{id}', [WhyChooseController::class, 'update'])->name('admin.why-choose-us-update');
    Route::post('/admin/why-choose-us/delete/{id}', [WhyChooseController::class, 'delete'])->name('admin.why-choose-us-delete');

    Route::get('/admin/testimonial/view', [TestimonialController::class, 'index'])->name('admin.testimonial');
    Route::get('/admin/testimonial/create', [TestimonialController::class, 'create'])->name('admin.testimonial-create');
    Route::post('/admin/testimonial/store', [TestimonialController::class, 'store'])->name('admin.testimonial-store');
    Route::get('/admin/testimonial/edit/{id}', [TestimonialController::class, 'edit'])->name('admin.testimonial-edit');
    Route::post('/admin/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('admin.testimonial-update');
    Route::post('/admin/testimonial/delete/{id}', [TestimonialController::class, 'delete'])->name('admin.testimonial-delete');

    Route::get('/admin/term-page', [TermPageController::class, 'index'])->name('admin.term-page');
    Route::post('/admin/term-page/update', [TermPageController::class, 'update'])->name('admin.term-page-update');

    Route::get('/admin/privacy-page', [PrivacyPageController::class, 'index'])->name('admin.privacy-page');
    Route::post('/admin/privacy-page/update', [PrivacyPageController::class, 'update'])->name('admin.privacy-page-update');

    Route::get('/admin/contact-page', [ContactPageController::class, 'index'])->name('admin.contact-page');
    Route::post('/admin/contact-page/update', [ContactPageController::class, 'update'])->name('admin.contact-page-update');

    Route::get('/admin/package/view', [PackageController::class, 'index'])->name('admin.package');
    Route::get('/admin/package/create', [PackageController::class, 'create'])->name('admin.package-create');
    Route::post('/admin/package/store', [PackageController::class, 'store'])->name('admin.package-store');
    Route::get('/admin/package/edit/{id}', [PackageController::class, 'edit'])->name('admin.package-edit');
    Route::post('/admin/package/update/{id}', [PackageController::class, 'update'])->name('admin.package-update');
    Route::post('/admin/package/delete/{id}', [PackageController::class, 'delete'])->name('admin.package-delete');

});