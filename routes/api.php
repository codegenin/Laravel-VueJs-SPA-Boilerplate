<?php

use Illuminate\Http\Request;

Route::post('register', 'Auth\AuthRegisterController');
Route::post('login', 'Auth\AuthLoginController');

Route::group(['middleware' => 'auth:api'], function () {
    Route::post('logout', 'Auth\AuthLogoutController');
    Route::get('me', 'UserController');
    Route::get('timeline', 'TimelineController');
});
