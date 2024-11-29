<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;


use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\AdminJoblistController;
use App\Http\Controllers\admin\AdminReportsController;
use App\Http\Controllers\admin\ListofUsersController;


use App\Http\Controllers\employer\EmployerController;
use App\Http\Controllers\employer\ApplicationRequestController;
use App\Http\Controllers\employer\EmpDashboardController;
use App\Http\Controllers\employer\EmpJoblistController;



use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\user\HomePageController;
use App\Http\Controllers\user\ProfilePageController;
use App\Http\Controllers\user\ResumeController;
use App\Http\Controllers\user\SavedResumeController;
use App\Http\Controllers\user\ApplicationController;






#guess viewers
Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/about', function () {
        return view('about');
    });
    Route::get('/contact', function () {
        return view('contact');
    });
    Route::get('/career_advice', function () {
        return view('career_advice');
    });
    Route::get('/joblist', function () {
        return view('joblist');
    });
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/adminprofile', [AdminProfileController::class, 'edit'])->name('adminprofile.edit');
    Route::get('/admin_joblist', [AdminJoblistController::class, 'admin_joblist'])->name('admin_joblist');
    Route::get('/admin_reports', [AdminReportsController::class, 'admin_reports'])->name('admin_reports');
    Route::get('/list_of_users', [ListofUsersController::class, 'list_of_users'])->name('list_of_users');
});

Route::middleware(['auth', 'employer'])->group(function () {
    Route::get('/employerprofile', [EmployerProfileController::class, 'edit'])->name('employerprofile.edit');
    Route::get('/application_request', [ApplicationRequestController::class, 'application_request'])->name('application_request');
    Route::get('/emp_dashboard', [EmpDashboardController::class, 'emp_dashboard'])->name('emp_dashboard');
    Route::get('/emp_joblist', [EmpJoblistController::class, 'emp_joblist'])->name('emp_joblist');

    Route::patch('/joblist/{joblist}',[EmpJoblistController::class, 'update'])->name('joblist.update');
    Route::post('/joblist',[EmpJoblistController::class, 'store'])->name('joblist.store');
    Route::delete('/joblist/{joblist}',[EmpJoblistController::class, 'destroy'])->name('joblist.destroy');
});
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/saved_resume', [SavedResumeController::class, 'saved_resume'])->name('saved_resume');
    Route::get('/resume', [ResumeController::class, 'resume'])->name('resume');
    Route::get('/index_user', [HomePageController::class, 'index_user'])->name('index_user');
    Route::get('/profile_page', [ProfilePageController::class, 'profile_page'])->name('profile_page');
    Route::get('/application', [ApplicationController::class, 'application'])->name('application');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
