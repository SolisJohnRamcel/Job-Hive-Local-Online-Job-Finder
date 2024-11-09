<?php

use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\SigninController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\view;

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
Route::get('/user', function () {
    return view('user');
});

Route::get('/signin', [view::class, 'signin'])-> name("signin");
Route::post('/signin', [SigninController::class, 'store'])->name('signin.store');

Route::get('/signup',  [view::class, 'signup'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');


Route::get('/resetpass',  [view::class, 'resetpass']);

Route::get('/user',  [view::class, 'user']);
Route::get('/user', [view::class, 'user'])->name('user')->middleware('auth');
