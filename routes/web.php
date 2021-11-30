<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
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


Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

    Route::group(['prefix' => 'users'], function () {
        Route::get('/list', [UserController::class, 'index'])->name('users.list');
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.list');
        Route::post('/roles/create', [RoleController::class, 'create'])->name('roles.create');
    });

});

