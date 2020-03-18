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
Route::group(["middleware" => "guest:api"], function () {
    Route::post("/login", "AuthController@login");
    Route::post('/register', 'AuthController@register');
});

Route::group(["middleware" => "auth:api"], function () {
    //Auth API
    Route::get("/me", "AuthController@me");
    Route::post('/logout', 'AuthController@logout');
    Route::post('/refresh', 'AuthController@refresh');
    //Users REST API
    Route::resource('users', 'Api\UserController');
});