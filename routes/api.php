<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\ShopOrderController;

use App\Http\Controllers\API\QpayController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/token/auth', [AuthController::class, 'token']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::get('/user', function(Request $request) {
        return $request->user();
    });

    Route::apiResources([
        'products'  => ProductController::class,
    ]);


    Route::post('orders', [ShopOrderController::class, 'index']);
    Route::post('order/create', [ShopOrderController::class, 'store']);
    Route::post('order/{id}', [ShopOrderController::class, 'show']);

    Route::group(['prefix' => 'payment'], function () {
        //QPAY webhook
        Route::get('qpay/webhook', [QpayController::class, 'webhook'])->name('payment.webhook.qpay');
    });
    // API route for logout user
});
