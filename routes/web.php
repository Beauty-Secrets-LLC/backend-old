<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
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


Route::group(['middleware' => ['auth']], function () {

    Route::get('/test', [DashboardController::class, 'test']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', [UserController::class, 'index'])->name('users.list');
        Route::get('/view/{id}', [UserController::class, 'show'])->name('user.view');
        Route::post('/register', [UserController::class, 'register']);
        Route::get('/delete/{id}', [UserController::class, 'delete']);
        Route::post('{id}/role/assign', [UserController::class, 'roleAssign'])->name('user.roleAssign');

        /*ROLES AND PERMIISIONS management*/
        Route::get('/permissions', [RoleController::class, 'permissions_list'])->name('permissions.list');
        Route::post('/permissions/ajaxadd', [RoleController::class, 'permissions_ajax_add']);
        Route::get('/permissions/delete/{id}', [RoleController::class, 'permissions_delete']);
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.list');
        Route::get('/roles/view/{id}', [RoleController::class, 'view'])->name('role.view');
        Route::post('/roles/update', [RoleController::class, 'update'])->name('role.update');
        Route::post('/roles/create', [RoleController::class, 'create'])->name('role.create');
        Route::get('/role/{role_id}/removeuser/{user_id}', [RoleController::class, 'removeUser']);
    });


    Route::group(['prefix' => 'shop'], function () {

        Route::get('/test', [ProductController::class, 'test']);

        Route::group(['prefix' => 'product'], function () {
            Route::get('/json', [ProductController::class, 'json'])->name('products.json');
            Route::get('/list', [ProductController::class, 'index']);
            Route::get('/new', [ProductController::class, 'new'])->name('product.new');
            Route::post('/create', [ProductController::class, 'store'])->name('product.create');
            Route::post('/delete/{id}', [ProductController::class, 'delete']);

        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/list', [ProductCategoryController::class, 'index']);
            Route::post('/new', [ProductCategoryController::class, 'store'])->name('product_category.create');
        }); 
    });  

});

