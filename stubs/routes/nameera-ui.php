<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Nameera UI Showcase Routes
|--------------------------------------------------------------------------
|
| These routes are automatically injected by the Nameera Starter Kit
| to provide instant UI examples and functionality.
|
*/

// UI Showcase Routes
Route::view('/ui/dashboard', 'pages.dashboard')->name('ui.dashboard');
Route::view('/ui/form-basic', 'pages.form-basic')->name('ui.form-basic');
Route::view('/ui/form-special', 'pages.form-special')->name('ui.form-special');
Route::view('/ui/datatable', 'pages.datatable')->name('ui.datatable');
Route::view('/ui/blank', 'pages.blank')->name('ui.blank');

// Auth Pages (if not already defined by Laravel Breeze/Jetstream)
if (!Route::has('login')) {
    Route::view('/login', 'auth.login')->name('login');
}

if (!Route::has('register')) {
    Route::view('/register', 'auth.register')->name('register');
}

// Error Pages (fallback)
Route::view('/403', 'errors.403')->name('error.403');
Route::view('/404', 'errors.404')->name('error.404');
Route::view('/500', 'errors.500')->name('error.500');