<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\employer\EmployerController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\EmployerProfileController;
use App\Http\Controllers\user\HomePageController;
use App\Http\Controllers\user\ProfilePageController;

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
});

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/app', [AppController::class, 'app'])->name('app');
    Route::get('/index_user', [HomePageController::class, 'index_user'])->name('index_user');
    Route::get('/profile_page', [ProfilePageController::class, 'profile_page'])->name('profile_page');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';
