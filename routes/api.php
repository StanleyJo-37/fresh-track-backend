<?php

use App\Http\Controllers\Admin\AdminFoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebAIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);

Route::prefix('/food')->group(function () {
    Route::get('/', [AdminFoodController::class, 'createFood']);
    Route::post('/', [AdminFoodController::class, 'updateFood']);
    Route::delete('/', [AdminFoodController::class, 'removeFood']);
});

Route::prefix('/ai')->group(function () {
    Route::post('/', [WebAIController::class, 'infer']);
});