<?php

use Illuminate\Support\Facades\Route;

route::get('/', function () {
    return view('welcome');
});

route::get('/home', function () {
    return view('home');
})->name('home');

route::get('/login', function () {
    return view('login');
})->name('login');

route::get('/report-new-item', function () {
    return view('repornewitem');
})->name('reportnewitem');

route::get('/item-detail', function () {
    return view('itemdetail');
})->name('itemdetail');

route::get('/profile', function () {
    return view('profile');
})->name('profile');

route::get('/my-report', function () {
    return view('myreport');
})->name('myreport');

route::get('/all-reports', function () {
    return view('allreports');
})->name('allreports');

route::get('/admin2', function () {
    return view('admin2');
})->name('admin2');

route::get('/user-list', function () {
    return view('userlist');
})->name('userlist');