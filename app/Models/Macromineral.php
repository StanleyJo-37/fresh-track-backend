<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Macromineral extends Model
{
    /** @use HasFactory<\Database\Factories\MacromineralFactory> */
    use HasFactory;

    protected $fillable = [
        'food_product_id',
        'calcium',
        'phosphorus',
        'magnesium',
        'sodium',
        'chloride',
        'potassium',
        'sulfur',
    ];
}
