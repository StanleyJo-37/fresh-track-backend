<?php

use App\Models\FoodProduct;
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
        Schema::create('macronutrients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FoodProduct::class, 'food_product_id');
            $table->float('calories')->nullable();
            $table->float('sugars_g')->nullable();
            $table->float('fibers_g')->nullable();
            $table->float('starch_g')->nullable();
            $table->float('proteins_g')->nullable();
            $table->float('saturated_fats_g')->nullable();
            $table->float('unsaturated_fats_g')->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macronutrients');
    }
};
