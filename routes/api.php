<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('register', 'AuthController@register');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('products', 'ProductController@getList');
    Route::get('properties', 'PropertyController@getList');
});
