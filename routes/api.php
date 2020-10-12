<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sayhi', [ProductController::class, 'hi']);

Route::get('/save', [ProductController::class, 'add']);

Route::get('/getAll', [ProductController::class, 'all']);

Route::get('/product/{product_id}', [ProductController::class, 'singleProduct']);

Route::get('/delete/{product_id}', [ProductController::class, 'deleteSingleProduct']);

Route::get('/updateProduct/{product_id}/{brand_name}', [ProductController::class, 'update']);

Route::get('/addWithPrice', [ProductController::class, 'addWithPrice']);

Route::get('/singleProductWithPrice/{product_id}', [ProductController::class, 'singleProductWithPrice']);

Route::get('/singleProductWithPriceAndSellers/{product_id}', [ProductController::class, 'singleProductWithPriceAndSellers']);

Route::get('/singleProductWithPriceAndSellersFormatted/{product_id}', [ProductController::class, 'singleProductWithPriceAndSellersFormatted']);

Route::get('/addWithPriceAndSellers', [ProductController::class, 'addWithPriceAndSellers']);