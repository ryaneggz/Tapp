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

// Basic Routes
Route::get('/', 'PagesController@index');
Route::get('/profile', 'PagesController@profile');
Route::get('/lock', 'PagesController@lock');
Route::get('/dashboard', 'PagesController@dashboard');


// Creates routes for all of this resources functions
Route::resource('timecards', 'TimecardsController');