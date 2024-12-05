<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UserInventory extends Model
{
    /** @use HasFactory<\Database\Factories\UserInventoryFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public function items():HasMany
    {
        return $this->hasMany(FoodInventory::class, 'user_inventory_id');
    }
    
}
