<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

route::get('/login', function () {
    return view('login');
})->name('login');