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

Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [AuthControler::class, 'register']);
    Route::post('login', [AuthControler::class, 'login']);
    Route::post('logout', [AuthControler::class, 'logout']);
});

Route::group(['prefix' => 'users'], function () {
    Route::post('create', [UserController::class, 'store']);
    Route::get('index', [UserController::class, 'index']);
    Route::get('show-user/{id}', [UserController::class, 'showUser']);
    Route::delete('delete/{id}', [UserController::class, 'delete']);
    Route::get('check-login', [UserController::class, 'checkLogin'])->name('checklLogin');
    Route::get('check-quyen', [UserController::class, 'checkQuyen'])->name('checkQuyen');


    // Route chỉ dành cho admin
    Route::middleware('role:admin')->group(function () {
        Route::put('update/{id}', [UserController::class, 'update']);
    });

    // Route chỉ dành cho store
    Route::middleware('role:store')->group(function () {
        Route::put('update/{id}', [UserController::class, 'update']);
    });

    // Route chỉ dành cho staff
    Route::middleware('role:staff')->group(function () {
        Route::put('update/{id}', [UserController::class, 'update']);
    });
});
