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
        Route::get('/', 'HomeController@index')->name('home');
        Route::resource('locations', 'LocationController');
        Route::get('/sponsor', 'SponsorController@index')->name('sponsors');
        Route::get('/home', 'SponsorController@index')->name('sponsors');
        Route::get('/statistics', 'StatisticController@index')->name('statistics');
        Route::get('/statistics/{location}', 'StatisticController@show')->name('apartment_statistics');
    });


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('{any?}',function(){
    return view('guests.home');
})->where('any','.*');

Route::options('/{path}', function(){ 
    return '';
})->where('path', '.*');
