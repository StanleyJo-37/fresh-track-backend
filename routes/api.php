<?php

use App\Http\Controllers\Admin\AdminFoodController;
use App\Http\Controllers\AzureController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebAIController;
use App\Http\Middleware\JsonDecrypt;
use Illuminate\Http\Middleware\HandleCors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UserController::class, 'login'])->middleware([JsonDecrypt::class]);
Route::post('/register', [UserController::class, 'register']);

Route::prefix('/food')->group(function () {
    Route::get('/', [AdminFoodController::class, 'createFood']);
    Route::post('/', [AdminFoodController::class, 'updateFood']);
    Route::delete('/', [AdminFoodController::class, 'removeFood']);
});

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::prefix('/inventory')->group(function () {
        Route::get('/', [InventoryController::class, 'getAllItem']);
        Route::post('/', [InventoryController::class, 'addItem']);
        Route::put('/', [InventoryController::class, 'editItem']);
        Route::delete('/{food_inventory_id}', [InventoryController::class, 'deleteItem']);
    });
});

Route::prefix('/ai')->group(function () {
    Route::post('/', [WebAIController::class, 'infer']);
});

Route::prefix('/image')->group(function() {
    Route::post('/', [AzureController::class, 'uploadImage']);
});