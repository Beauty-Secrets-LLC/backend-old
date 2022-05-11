<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerPointController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\VatController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ShopOrderController;
use App\Http\Controllers\CouponController;

use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\SubscriptionPlanController;
use App\Http\Controllers\SubscriptionTransactionController;

use App\Http\Controllers\GiftCardController;
use App\Http\Controllers\GiftCardTemplateController;
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
Route::get('/', [DashboardController::class, 'index']);//->name('dashboard-home'); 

Route::group(['middleware' => ['auth']], function () {

    Route::get('/test', [DashboardController::class, 'test']);
    
    Route::post('/upload', [DashboardController::class, 'upload'])->name('dashboard.upload');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 
    Route::get('/activity-log', [DashboardController::class, 'activitylog'])->name('activitylog'); 
    Route::get('/activity-log/json', [DashboardController::class, 'activitylog_listjson'])->name('activitylog.json'); 

    Route::group(['prefix' => 'media'], function () {

        Route::get('/list', [MediaController::class, 'index'])->name('media.list'); 
        Route::post('/upload', [MediaController::class, 'upload'])->name('media.upload'); 
    });

    Route::group(['prefix' => 'ebarimt'], function () {
        Route::get('/list', [VatController::class, 'index'])->name('ebarimt.list'); 
    });

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
        Route::get('/view/{id}', [CustomerController::class, 'show'])->name('customer.view');
        Route::get('/create', [CustomerController::class, 'create'])->name('customers.create');


        Route::group(['prefix' => 'points'], function () {
            Route::get('/list', [CustomerPointController::class, 'index'])->name('points.list');
            Route::get('/view/{id}', [CustomerPointController::class, 'show'])->name('points.view');
            Route::post('/update', [CustomerPointController::class, 'update']);
        });

    });

    Route::group(['prefix' => 'shop'], function () {
        Route::group(['prefix' => 'product'], function () {
            Route::get('/json', [ProductController::class, 'json'])->name('products.json');
            Route::get('/list', [ProductController::class, 'index'])->name('products.list');
            Route::get('/new', [ProductController::class, 'create'])->name('product.new');
            Route::post('/create', [ProductController::class, 'store'])->name('product.create');
            Route::get('/{slug}', [ProductController::class, 'show'])->name('product.view');
            Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
            Route::post('/delete', [ProductController::class, 'delete']);
            Route::post('/restore/{id}', [ProductController::class, 'restore']);

        });

        Route::group(['prefix' => 'category'], function () {
            Route::get('/list', [ProductCategoryController::class, 'index'])->name('product_category.list');
            Route::post('/new', [ProductCategoryController::class, 'store'])->name('product_category.new');
        }); 

        Route::group(['prefix' => 'order'], function () {
            Route::get('/list', [ShopOrderController::class, 'index'])->name('order.list');
            Route::get('/json', [ShopOrderController::class, 'json'])->name('order.json');
            Route::get('/view/{id}', [ShopOrderController::class, 'show'])->name('order.view');
        }); 

        Route::group(['prefix' => 'invoice'], function () {
            Route::get('/resend', [ShopOrderInvoiceController::class, 'resend'])->name('invoice.resend');
        }); 

        Route::group(['prefix' => 'coupon'], function () {
            Route::get('/list', [CouponController::class, 'index'])->name('coupon.list');
            Route::get('/new', [CouponController::class, 'create'])->name('coupon.new');
        }); 
    });


    Route::group(['prefix' => 'giftcard'], function () {
        Route::get('/list', [GiftCardController::class, 'index'])->name('giftcard.list');

        Route::group(['prefix' => 'template'], function () {
            Route::get('/list', [GiftCardTemplateController::class, 'index'])->name('giftcardtemplate.list');
            Route::get('/new', [GiftCardTemplateController::class, 'create'])->name('giftcardtemplate.new');
            Route::post('/store', [GiftCardTemplateController::class, 'store'])->name('giftcardtemplate.store');
            Route::get('/view/{id}', [GiftCardTemplateController::class, 'show'])->name('giftcardtemplate.show');
        });
    });


    Route::group(['prefix' => 'subscription'], function () {
        Route::get('/list', [SubscriptionController::class, 'index'])->name('subscription.list');
        Route::get('/json', [SubscriptionController::class, 'json'])->name('subscription.json');
        Route::get('/view/{id}', [SubscriptionController::class, 'show'])->name('subscription.view');
        Route::get('/import', [SubscriptionController::class, 'import']);
        Route::post('/importdata', [SubscriptionController::class, 'importdata'])->name('subscription.import');

        Route::get('/plans', [SubscriptionPlanController::class, 'index'])->name('subscription.plans');

        Route::group(['prefix' => 'transaction'], function () {
            Route::get('/list', [SubscriptionTransactionController::class, 'index'])->name('transaction.list');
            Route::get('/json', [SubscriptionTransactionController::class, 'json'])->name('transaction.json');
            Route::get('/import', [SubscriptionTransactionController::class, 'import']);
            Route::post('/importdata', [SubscriptionTransactionController::class, 'importdata'])->name('subscription.import_transaction');
            Route::get('/card', [SubscriptionTransactionController::class, 'get_list_by_card'])->name('card.transactions');
        });
    });

});

