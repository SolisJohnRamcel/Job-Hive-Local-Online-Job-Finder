<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth;

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

Route::get('/signin', [auth::class, 'signin']);

Route::get('/signup',  [auth::class, 'signup']);

Route::get('/resetpass',  [auth::class, 'resetpass']);

Route::get('/user',  [auth::class, 'user']);