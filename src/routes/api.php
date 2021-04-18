<?php

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

Route::group(['middleware'=>['AuthJWT']], function () {
    Route::get('/users/all',[\App\Http\Controllers\UserController::class,'all']);
    Route::post('/users',[\App\Http\Controllers\UserController::class,'addUser']);
});

Route::get('/login',function (Request $request) {
   $credentials = $request->only(['email','password']);
    //$token = auth()->attempt($credentials);
    $token = auth('api')->attempt($credentials);

    if (! $token) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    return response()->json([
        'access_token' => $token,
        'token_type' => 'bearer',
        'expires_in' => auth('api')->factory()->getTTL() * 60
    ]);
});
