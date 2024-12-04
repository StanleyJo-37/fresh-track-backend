<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['name' => 'Jacob']);
});

Route::get('/food', function() {
    return view('create-food');
});

