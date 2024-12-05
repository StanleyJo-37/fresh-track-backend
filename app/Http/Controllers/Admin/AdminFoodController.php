<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use Illuminate\Http\Request;

class AdminFoodController extends Controller
{
    public function all(Request $request){
        return FoodProduct::all();
    }

    public function createFood(Request $request){
        $request->validate([
            'local_name' => 'required',
            'scientific_name' => 'required',
            'serving_size_g' => 'required'
        ]);

        FoodProduct::create($request->all());
    }

    public function updateFood(Request $request){

    }

    public function removeFood(Request $request){

    }

    // Views
    public function viewFood(){
        $foods = FoodProduct::all();
        return view('/view-food', ['foods' => $foods]);
    }

    public function addFood(){

        return view('/create-food');
    }

    public function editFood(){
        return view('/update-food');
    }
}
