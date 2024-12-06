<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class FoodProduct extends Model
{
    /** @use HasFactory<\Database\Factories\FoodProductFactory> */
    use HasFactory;

    protected $table = 'food_products';

    protected $fillable = [
        'local_name',
        'scientific_name',
        'serving_size_g',
    ];

    // public function img(){
    //     return $this->asset_relation()->asset;
    // }

    public function asset_relation(): MorphOne
    {
        return $this->morphOne(AssetRelation::class, 'asset_relation');
    }

    public function macronutrient():HasOne{
        return $this->hasOne(Macronutrient::class, 'food_product_id');
    }

    public function macromineral():HasOne{
        return $this->hasOne(Macromineral::class, 'food_product_id');
    }

    public function micronutrient():HasOne{
        return $this->hasOne(Micronutrient::class, 'food_product_id');
    }

}
