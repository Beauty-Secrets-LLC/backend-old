<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\SubscriptionTransactionController;
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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', [DashboardController::class, 'index'])->name('dashboard'); 


Route::group(['middleware' => ['auth']], function () {

    Route::get('/test', [DashboardController::class, 'test']);
    Route::post('/upload', [DashboardController::class, 'upload'])->name('dashboard.upload');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

    Route::group(['prefix' => 'user'], function () {
        Route::get('/list', [UserController::class, 'index'])->name('users.list');
        Route::get('/view/{id}', [UserController::class, 'show'])->name('user.view');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::post('/register', [UserController::class, 'register']);
        Route::get('/delete/{id}', [UserController::class, 'delete']);
        Route::post('/delete-selected', [UserController::class, 'delete_selected']);
        Route::post('{id}/role/assign', [UserController::class, 'roleAssign'])->name('user.roleAssign');

        /*ROLES AND PERMIISIONS management*/
        Route::get('/permissions', [RoleController::class, 'permissions_list'])->name('permissions.list');
        Route::get('/permissions/json', [RoleController::class, 'permissions_json'])->name('permissions.json');
        Route::post('/permissions/add', [RoleController::class, 'permissions_ajax_add']);
        Route::post('/permissions/delete', [RoleController::class, 'permissions_delete']);
        
        Route::get('/roles', [RoleController::class, 'index'])->name('roles.list');
        Route::get('/roles/view/{id}', [RoleController::class, 'view'])->name('role.view');
        Route::post('/roles/update', [RoleController::class, 'update'])->name('role.update');
        Route::post('/roles/create', [RoleController::class, 'create'])->name('role.create');
        Route::get('/role/{role_id}/removeuser/{user_id}', [RoleController::class, 'removeUser']);
    });

    Route::group(['prefix' => 'customer'], function () {
        Route::get('/list', [CustomerController::class, 'index'])->name('customers.list');
        Route::get('/json', [CustomerController::class, 'json'])->name('customers.json');
        Route::get('/view/{id}', [CustomerController::class, 'show'])->name('customer.create');
        Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');
    });

    Route::group(['prefix' => 'shop'], function () {
        Route::group(['prefix' => 'product'], function () {
            Route::get('/json', [ProductController::class, 'json'])->name('products.json');
            Route::get('/list', [ProductController::class, 'index']);
            Route::get('/new', [ProductController::class, 'create'])->name('product.new');
            Route::post('/create', [ProductController::class, 'store'])->name('product.create');
            Route::get('/view/{id}', [ProductController::class, 'show'])->name('product.view');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::post('/delete', [ProductController::class, 'delete']);
            Route::post('/restore/{id}', [ProductController::class, 'restore']);

        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/list', [ProductCategoryController::class, 'index']);
            Route::post('/new', [ProductCategoryController::class, 'store'])->name('product_category.create');
        }); 
    });

    Route::group(['prefix' => 'subscription'], function () {
        Route::get('/list', [SubscriptionController::class, 'index'])->name('subscription.list');
        Route::get('/plans', [SubscriptionPlanController::class, 'index'])->name('subscription.plans');

        Route::group(['prefix' => 'transaction'], function () {
            Route::get('/list', [SubscriptionTransactionController::class, 'index'])->name('transaction.list');
            Route::get('/json', [SubscriptionTransactionController::class, 'json'])->name('transaction.json');
            Route::get('/import', [SubscriptionTransactionController::class, 'import']);
            Route::post('/importdata', [SubscriptionTransactionController::class, 'importdata'])->name('subscription.import_transaction');
        });
        
        
    });

});

