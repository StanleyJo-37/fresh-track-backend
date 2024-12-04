<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class FoodInventory extends Pivot
{
    protected $fillable = [
        'food_product_id',
        'user_inventory_id',
        'fresh_until'
    ];

    protected $table = 'food_inventory';
}
