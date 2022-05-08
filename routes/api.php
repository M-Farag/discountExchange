<?php

use App\Http\Controllers\Brands\CouponsController;
use App\Http\Controllers\Users\DiscountsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Brand routes
Route::prefix('v1/brand')->middleware('auth:api')->group(function (){
    Route::post('/coupons',[CouponsController::class,'store']);
});


//User Routes
Route::prefix('v1/user')->middleware('auth:api')->group(function (){
    Route::post('/discounts',[DiscountsController::class,'store']);
});
