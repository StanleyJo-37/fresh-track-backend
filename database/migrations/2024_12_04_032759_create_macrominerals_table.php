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
        Schema::create('macrominerals', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FoodProduct::class, 'food_product_id');
            $table->float('calcium');
            $table->float('phosphorus');
            $table->float('magnesium');
            $table->float('sodium');
            $table->float('chloride');
            $table->float('potassium');
            $table->float('sulfur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('macrominerals');
    }
};
