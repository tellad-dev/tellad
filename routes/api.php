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
    Route::post("/login", "AuthController@login");
    Route::post('/register', 'AuthController@register');
    // Auth API
    Route::get("/me", "AuthController@me");
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    //REST API
    Route::resource('users','Api\UserController');
    Route::resource('users/{user}/profiles','Api\ProfileController');
    Route::resource('adrequests','Api\AdRequestController');
    Route::resource('users/{user}/businesses','Api\BusinessController');
    Route::resource('ads','Api\AdController');
    Route::resource('users/{user}/shops','Api\ShopController');
    Route::resource('spaces','Api\SpaceController');
    Route::resource('spaceforms','Api\SpaceFormController');