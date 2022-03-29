<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Location API
Route::get('/locations', 'Api\LocationController@index');
Route::get('/locations/{slug}','Api\LocationController@show');

// Visuals API
Route::post('/visuals/store','Api\VisualController@store');

Route::post('/leads/store', 'Api\LeadController@store');

Route::get('/categories', 'Api\CategoryController@index');
