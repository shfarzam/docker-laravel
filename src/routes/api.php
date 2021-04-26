<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

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

Route::group(['middleware'=>['AuthJWT']], function () {
    Route::get('/users',[Controllers\User::class,'all']);
    Route::post('/users',[Controllers\User::class,'addUser']);

    Route::get('/customers',[Controllers\Customer::class,'all']);
    Route::post('/customers',[Controllers\Customer::class,'addCustomer']);
    Route::put('/customers',[Controllers\Customer::class,'editCustomer']);

    Route::get('/products',[Controllers\Product::class,'all']);
    Route::post('/products',[Controllers\Product::class,'addProduct']);

    Route::get('/orders',[Controllers\Order::class,'all']);
    Route::post('/orders',[Controllers\Order::class,'addOrder']);
});

Route::get('/login',function (Request $request) {
   $credentials = $request->only(['email','password']);
   $token = auth('api')->attempt($credentials);

    if (! $token) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    return response()->json([
        'access_token'  => $token,
        'token_type'    => 'bearer',
        'expires_in'    => auth('api')->factory()->getTTL() * 60
    ]);
});
