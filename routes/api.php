<?php

use Illuminate\Http\Request;

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
    // Auth API
    Route::post("/login", "AuthController@login");
    Route::post('/register', 'AuthController@register');
    Route::post('/logout', 'AuthController@logout');
    //REST API
    Route::resource('profiles','Api\ProfileController');
    Route::resource('adrequests','Api\AdRequestController');
    Route::resource('businesses','Api\BusinessController');
    Route::resource('ads','Api\AdController');
    Route::resource('shops','Api\ShopController');
    Route::resource('spaces','Api\SpaceController');
    Route::resource('spaceforms','Api\SpaceFormController');