<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware('auth')
    ->namespace('Host')
    ->name('host.')
    ->prefix('host')
    ->group(function() {
        // Route::get('/', 'HomeController@index')->name('home');
        Route::resource('locations', 'LocationController');
        // Route::get('/categories', 'CategoryController@index')->name('categories');
        // Route::get('/categories/{slug}', 'CategoryController@show')->name('category_info');
    });

Route::get('/home', 'HomeController@index')->name('home');
