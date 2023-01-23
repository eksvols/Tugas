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
    return view('welcome');
});

Route::get('/login', 'App\Http\Controllers\AuthController::login()')->name('login');
Route::post('/login', 'AuthController@login')->name('login');
Route::get('/register', 'AuthController@registerForm')->name('register');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/reset-password', 'AuthController@resetPasswordForm')->name('reset-password');
Route::post('/reset-password', 'AuthController@resetPassword')->name('reset-password');
