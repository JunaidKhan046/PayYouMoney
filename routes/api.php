<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\APIAuth\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'auth', 'middleware' => 'api'], function ($router) {
    Route::post('login', [AuthController::class, 'login'])->name('api.login');
    Route::post('logout', [AuthController::class, 'logout'])->name('api.logout');
    Route::post('register', [AuthController::class, 'registerUser'])->name('api.register');
});


Route::group(['prefix' => 'auth', 'middleware' => 'auth:api'], function ($router) {
    Route::get('/store-csv', [ProfileController::class, 'storeCsvData'])->name('store_csv');
});


