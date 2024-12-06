<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodProduct;
use Exception;
use Illuminate\Http\Request;

class AdminFoodController extends Controller
{
    public function store(Request $request)
    {
        try {
            $request->validate([
                'local_name' => 'required',
                'scientific_name' => 'required',
                'serving_size_g' => 'required'
            ]);

            $food = FoodProduct::create($request->only([
                'local_name',
                'scientific_name',
                'serving_size_g'
            ]));
            $food->macronutrient()->create($request->macronutrient);
            $food->macromineral()->create($request->macromineral);
            $food->micronutrient()->create($request->micronutrient);
        } catch (Exception $e) {
            dd($e);
        }

        return back()->with('success', 'succesfully added ' . $food->local_name);
    }

    public function update(Request $request, $id)
    {
        try {
            $food = FoodProduct::findOrFail($id);
            $food->update([
                'local_name' => $request->local_name,
                'scientific_name' => $request->scientific_name,
                'serving_size_g' => $request->serving_size_g
            ]);
            $food->macronutrient()->update($request->macronutrient);
            $food->macromineral()->update($request->macromineral);
            $food->micronutrient()->update($request->micronutrient);

        } catch (Exception $e) {
            dd($e);
        }

        return back()->with('success', $food->local_name . ' successfully updated.');
    }

    public function delete(Request $request, $id)
    {
        try{
            $food = FoodProduct::findOrFail($id);
            $food->macronutrient()->delete();
            $food->macromineral()->delete();
            $food->micronutrient()->delete();
            $food->delete();
            
        } catch(Exception $e){
            dd($e);    
        }
        
        return redirect(route('foods.list'))->with('success', $food->local_name . 'succesfully deleted.');
    }



    // Views
    public function index()
    {
        $foods = FoodProduct::all();
        return view('/food/index', ['foods' => $foods]);
    }

    public function create()
    {
        return view('/food/create');
    }

    public function show(Request $request, $id)
    {
        $food = FoodProduct::where('id', $id)->with([
            'macronutrient',
            'macromineral',
            'micronutrient'
        ])->first();
        
        return view("/food/edit", ['food' => $food]);
    }
}
