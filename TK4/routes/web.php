<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\ItemsController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::group(['middleware' => ['auth', 'role:admin'], 'prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/user', [AdminController::class, 'userDisplay'])->name('admin.userDisplay');
    Route::get('/user/create', [AdminController::class, 'userCreate'])->name('admin.userCreate');
    Route::get('/user/show/{id}', [AdminController::class, 'userShow'])->name('admin.userShow');
    Route::get('/user/edit/{id}', [AdminController::class, 'userEdit'])->name('admin.userEdit');
    Route::post('/user/store/', [AdminController::class, 'userStore'])->name('admin.userStore');
    Route::post('/user/update/{id}', [AdminController::class, 'userUpdate'])->name('admin.userUpdate');
    Route::post('/user/delete/{id}', [AdminController::class, 'userDelete'])->name('admin.userDelete');
});

Route::group(['middleware' => ['auth', 'role:staff'], 'prefix' => 'staff'], function () {
    Route::get('/', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/pembeli', [StaffController::class, 'userDisplay'])->name('staff.userDisplay');
    Route::match(['get', 'post'], '/pembeli/create', [StaffController::class, 'userCreate'])->name('staff.userCreate');
});

Route::group(['middleware' => ['auth', 'role:pembeli'], 'prefix' => 'pembeli'], function () {
    Route::get('/', [PembeliController::class, 'index'])->name('pembeli.index');
    Route::get('/userManagement')->name('pembeli.userManagament');
});

Route::group(['middleware' => ['auth', 'role:admin|staff|pembeli'], 'prefix' => 'items'], function(){
    Route::get('/', [ItemsController::class, 'index'])->name('items.index');
    Route::post('/buy/{id}', [ItemsController::class, 'buy'])->name('items.buy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
