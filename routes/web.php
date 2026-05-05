<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/dashboard', function () {
    return view('dashboard');
});


Route::get('/tugas/create', function () {
    return view('tugas.create');
});

Route::get('/tugas/detail', function () {
    return view('tugas.show');
});


Route::get('/categories', function () { 
    return view('categories.index');
});

Route::get('/profile', function () {
    return view('profile.index');
});