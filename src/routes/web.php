<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserAuth;
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
Route::post('/auth/save',[MainController::class,'save'])->name('auth.save');
Route::post('/auth/check',[MainController::class,'checkLogin'])->name('auth.check');
Route::get('/shop/products',[MainController::class,'logout']);
Route::get('/auth/logout',[MainController::class, 'logout'])->name('auth.logout');

Route::group(['middleware'=>['AuthCheck']], function() {
    Route::get('/auth/login',[MainController::class,'login'])->name('auth.login');
    Route::get('/auth/register',[MainController::class,'register'])->name('auth.register');
    Route::get('/admin/dashboard',[MainController::class,'dashboard'])->name('admin.dashboard');
    Route::get('/admin/dashboard/{table}',[MainController::class,'dashboard'])->name('admin.tables');
});

Route::post('user',[UserAuth::class,'userLogin']);
//Route::view("login",'login');

Route::view("profile",'profile');

Route::get('/login', function () {
    if(session()->has('user')) {
        return redirect('profile');
    }
    return view('login');
});

Route::get('/logout', function () {
    if(session()->has('user')) {
        session()->pull('user');
    }
    return redirect('login');
});
