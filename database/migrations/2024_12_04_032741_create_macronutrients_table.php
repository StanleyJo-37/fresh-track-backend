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
            $table->float('calories');
            $table->float('sugars_g');
            $table->float('fibers_g');
            $table->float('starch_g');
            $table->float('proteins_g');
            $table->float('saturated_fats_g');
            $table->float('unsaturated_fats_g');
            $table->timestamps();
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
