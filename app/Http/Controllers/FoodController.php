<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodController extends Controller
{
    //
    public static function getFoodInformationSubQuery(int $id) {
        return DB::raw("
                SELECT
                    fp.id,
                    fp.local_name,
                    fp.scientific_name,
                    fp.serving_size_g,
                    mam.calcium,
                    mam.phosporus,
                    mam.magnesium,
                    mam.sodium,
                    mam.chloride,
                    mam.potassium,
                    mam.sulfur,
                    man.calories,
                    man.sugars_g,
                    man.fibers_g,
                    man.starch_g,
                    man.proteins_g,
                    min.vitamin_b1,
                    min.vitamin_b2,
                    min.vitamin_b3,
                    min.vitamin_b5,
                    min.vitamin_b6,
                    min.vitamin_b7,
                    min.vitamin_b9,
                    min.vitamin_b12,
                    min.vitamin_c,
                    min.vitamin_a,
                    min.vitamin_d,
                    min.vitamin_e,
                    min.vitamin_k,
                    min.iron,
                    min.manganese,
                    min.copper,
                    min.zinc,
                    min.iodine,
                    min.fluoride,
                    min.selenium
                FROM food_products fp
                LEFT JOIN macrominerals mam ON mam.food_product_id = fp.id
                LEFT JOIN macronutrients man ON man.food_product_id = fp.id
                LEFT JOIN micronutrients min ON min.food_product_id = fp.id
                WHERE fp.id = $id
        ");
    }
}
