<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;

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
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
    Route::get('/adminprofile', [AdminProfileController::class, 'edit'])->name('adminprofile.edit');
});

Route::middleware(['auth', 'employer'])->group(function () {
    Route::get('/employerprofile', [EmployerProfileController::class, 'edit'])->name('employerprofile.edit');
    Route::get('/employer', [EmployerController::class, 'employer'])->name('employer');
    Route::get('/application_request', [ApplicationRequestController::class, 'application_request'])->name('application_request');
    Route::get('/emp_dashboard', [EmpDashboardController::class, 'emp_dashboard'])->name('emp_dashboard');
    Route::get('/emp_joblist', [EmpJoblistController::class, 'emp_joblist'])->name('emp_joblist');
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/saved_resume', [SavedResumeController::class, 'saved_resume'])->name('saved_resume');
    Route::get('/resume', [ResumeController::class, 'resume'])->name('resume');
    Route::get('/app', [AppController::class, 'app'])->name('app');
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
