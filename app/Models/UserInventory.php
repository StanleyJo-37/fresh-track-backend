<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInventory extends Model
{
    /** @use HasFactory<\Database\Factories\UserInventoryFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];
}
