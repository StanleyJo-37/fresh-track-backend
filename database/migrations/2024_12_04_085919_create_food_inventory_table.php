<?php

use App\Models\FoodProduct;
use App\Models\UserInventory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('food_inventory', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FoodProduct::class, 'food_product_id');
            $table->foreignIdFor(UserInventory::class, 'user_inventory_id');
            $table->timestamp('fresh_until');
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_inventory');
    }
};
