<?php

use Illuminate\Http\Request;

Route::apiResource('/product', 'ProductController');
Route::apiResource('/category', 'CategoryController');
Route::middleware('auth:api')->post('/charge', 'PaymentController@charge');

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    //Route::post('charge', 'PaymentController@charge');

});