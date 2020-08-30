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

Route::get('/', function () {
    dd(1);
});

Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\AuthController@register'
]);

Route::post('register', [
    'as' => 'register-post',
    'uses' => 'Auth\AuthController@postRegister'
]);


Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@login'
]);


Route::post('login', [
    'as' => 'login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::get('profile', [
    'as' => 'profile',
    'uses' => 'Auth\AuthController@profile'
]);
