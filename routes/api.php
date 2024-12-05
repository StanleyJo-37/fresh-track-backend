<?php

use App\Http\Controllers\Admin\AdminFoodController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/login', [UserController::class, 'login']);
Route::get('/register', [UserController::class, 'register']);

// Route::prefix('/food')->group(function () {
//     Route::get('/', [AdminFoodController::class, 'createFood']);
//     Route::post('/', [AdminFoodController::class, 'updateFood']);
//     Route::delete('/', [AdminFoodController::class, 'removeFood']);
// });
