<?php

use Illuminate\Http\Request;

Route::post('/register', 'Auth\AuthRegisterController');
Route::post('/login', 'Auth\AuthLoginController');
