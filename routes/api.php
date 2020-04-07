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
    Route::namespace('Api')->group(function () {
        Route::post("/login", "AuthController@login");
        Route::post('/register', 'AuthController@register');
        Route::post('/logout', 'AuthController@logout');
    });
    //REST API
    Route::resource('profiles','Api\ProfileController', ['except' => ['create', 'edit', 'show']]);
    Route::resource('adrequests','Api\AdRequestController', ['except' => ['create', 'edit']]);
    Route::resource('businesses','Api\BusinessController', ['except' => ['create', 'edit']]);
    Route::resource('ads','Api\AdController', ['except' => ['create', 'edit']]);
    Route::resource('shops','Api\ShopController', ['except' => ['create', 'edit']]);
    Route::resource('spaces','Api\SpaceController', ['except' => ['create', 'edit']]);