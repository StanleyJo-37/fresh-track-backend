<?php

use App\Http\Controllers\Admin\AdminAuthenticateController;
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

Route::prefix('/login')->group(function () {
    Route::get('/', [AdminAuthenticateController::class, 'loginView']);
    Route::post('/action', [AdminAuthenticateController::class, 'authenticate']);
});

Route::prefix('/register')->group(function () {
    Route::get('/', [AdminAuthenticateController::class, 'registerView']);
    Route::post('/action', [AdminAuthenticateController::class, 'register']);
});

// Route::prefix('/food')->group(function () {
//     Route::get('/', [AdminFoodController::class, 'viewFood']);
//     Route::get('/add', [AdminFoodController::class, 'addFood']);
//     Route::get('/edit', [AdminFoodController::class, 'editFood']);
//     Route::prefix('/action')->group(function () {
//         Route::post('/', [AdminFoodController::class, 'createFood']);
//         Route::patch('/', [AdminFoodController::class, 'updateFood']);
//         Route::delete('/', [AdminFoodController::class, 'removeFood']);
//     });
// });

Route::get('/foods', [AdminFoodController::class, 'index'])->name('foods.list');
Route::prefix('/food')->group(function () {
    Route::get('/create', [AdminFoodController::class, 'create'])->name('foods.create');
    Route::post('/store', [AdminFoodController::class, 'store'])->name('foods.store');
    Route::prefix('/{id}')->group(function () {
        Route::delete('/', [AdminFoodController::class, 'delete'])->name('foods.delete');
        Route::get('/', [AdminFoodController::class, 'show'])->name('foods.show');
        Route::post('/', [AdminFoodController::class, 'update'])->name('foods.update');
    });
});


Route::prefix('/users')->group(function () {});
