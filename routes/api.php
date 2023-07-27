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

Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
Route::post('/forgot', [App\Http\Controllers\Api\AuthController::class, 'forgot']);
Route::post('/getpassword', [App\Http\Controllers\Api\AuthController::class, 'getpassword']);

// protected route

Route::group(['middleware' => ['auth:sanctum']], function(){

    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    Route::post('/varify', [App\Http\Controllers\Api\AuthController::class, 'varify']);
    Route::get('/profile', [App\Http\Controllers\Api\AuthController::class, 'profile']);
    Route::get('/sendcode', [App\Http\Controllers\Api\AuthController::class, 'sendcode']);

    // customer
    Route::post('/profile/update', [App\Http\Controllers\Api\AuthController::class, 'update']);
});


Route::get('/product/search/{term}', [App\Http\Controllers\Api\UserController::class, 'search']);
Route::get('/product/cat/{id}', [App\Http\Controllers\Api\UserController::class, 'catPro']);
Route::get('/product/single/{id}', [App\Http\Controllers\Api\UserController::class, 'singlePro']);
Route::get('/top-cat', [App\Http\Controllers\Api\UserController::class, 'topCat']);
Route::get('/allorders', [App\Http\Controllers\Api\UserController::class, 'orders']);
Route::post('/addorder', [App\Http\Controllers\Api\UserController::class, 'addOrder']);
