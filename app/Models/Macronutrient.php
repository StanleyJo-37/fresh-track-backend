<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Macronutrient extends Model
{
    /** @use HasFactory<\Database\Factories\MacronutrientFactory> */
    use HasFactory;

    protected $fillable = [
        'food_product_id',
        'calories',
        'sugars_g',
        'fibers_g',
        'starch_g',
        'proteins_g',
        'saturated_fats_g',
        'unsaturated_fats_g',
    ];
}
