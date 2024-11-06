<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/signin', function () {
    return view('signin');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::get('/resetpass', function () {
    return view('resetpass');
});
Route::get('/career_advice', function () {
    return view('career_advice');
});
Route::get('/user', function () {
    return view('user');
});