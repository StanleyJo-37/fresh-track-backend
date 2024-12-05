<?php

use App\Http\Controllers\Admin\AdminFoodController;
use App\Http\Controllers\UserController;
use App\Models\FoodProduct;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['name' => 'Jacob']);
});

// Route::get('/food', function() {
//     return view('create-food');
// });

Route::prefix('/food')->group(function () {
    Route::get('/', [AdminFoodController::class, 'viewFood']);
    Route::get('/add', [AdminFoodController::class, 'addFood']);
    Route::get('/edit', [AdminFoodController::class, 'editFood']);
});

Route::prefix('/users')->group(function () {});
