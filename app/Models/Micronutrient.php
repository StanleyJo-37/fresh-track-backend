<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micronutrient extends Model
{
    /** @use HasFactory<\Database\Factories\MicronutrientFactory> */
    use HasFactory;

    protected $fillable = [
        'vitamin_b1',
        'vitamin_b2',
        'vitamin_b3',
        'vitamin_b5',
        'vitamin_b6',
        'vitamin_b7',
        'vitamin_b9',
        'vitamin_b12',
        'vitamin_c',
        'vitamin_a',
        'vitamin_d',
        'vitamin_e',
        'vitamin_k',
        'iron',
        'manganese',
        'copper',
        'zinc',
        'iodine',
        'fluoride',
        'selenium'
    ];
}
