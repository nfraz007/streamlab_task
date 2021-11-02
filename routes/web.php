<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', 'HomeController@login')->name('login');
Route::get('/login/twitch', 'HomeController@login_twitch')->name('login_twitch');
Route::get('/login/twitch/callback/', 'HomeController@login_twitch_callback');

Route::middleware(['auth.jwt'])->group(function() {
    Route::get('/', 'HomeController@dashboard')->name('dashboard');
    Route::get('/logout', 'HomeController@logout');
});
