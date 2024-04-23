<?php

use App\Http\Controllers\Auth\AuthControler;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\User\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::POST('payment', [PaymentController::class, 'payment']);

Route::post('register', [AuthControler::class, 'register']);
Route::post('login', [AuthControler::class, 'login']);
Route::post('logout', [AuthControler::class, 'logout']);
Route::get('get', [AuthControler::class, 'getUser']);
Route::post('update', [AuthControler::class, 'update']);
Route::post('/delete/{id}', [AuthControler::class, 'delete']);


// Route::post('test', [UserController::class, 'test']);
Route::post('create', [UserController::class, 'store']);
Route::get('index', [UserController::class, 'index']);
Route::put('update/{id}', [UserController::class, 'update']);
Route::delete('delete/{id}', [UserController::class, 'delete']);
