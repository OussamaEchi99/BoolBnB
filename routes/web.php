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
        Route::get('/statistics', 'StatisticController@index')->name('statistics');
        Route::get('/statistics/{location}', 'StatisticController@show')->name('apartment_statistics');
        Route::get('/emails', 'LeadController@index') -> name('emails');
        Route::get('/emails/{location}', 'LeadController@show')->name('location_emails');
        Route::get('checkout','CheckoutController@checkout');
        Route::post('checkout','CheckoutController@afterpayment')->name('credit-card');
    });


// Route::get('/home', 'HomeController@index')->name('home');

Route::get('{any?}',function(){
    return view('guests.userhome');
})->where('any','.*');

Route::options('/{path}', function(){ 
    return '';
})->where('path', '.*');

// Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');
// Route::get('/payment/process', 'PaymentsController@process')->name('payment.process');
// Route::get('addmoney/stripe', array('as' => 'addmoney.paystripe','uses' => 'MoneySetupController@PaymentStripe'));
// Route::post('addmoney/stripe', array('as' => 'addmoney.stripe','uses' => 'MoneySetupController@postPaymentStripe'));