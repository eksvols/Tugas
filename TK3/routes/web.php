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
    return view('auth.login');
});

Route::post('/login', 'Auth\LoginController@login');
Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});
Route::middleware(['role:staff'])->group(function () {
    Route::get('/staff', function () {
        return view('staff.dashboard');
    });
});
Route::middleware(['role:pembeli'])->group(function () {
    Route::get('/pembeli', function () {
        return view('pembeli.dashboard');
    });
});
Route::get('/logout', 'Auth\LoginController@logout');
