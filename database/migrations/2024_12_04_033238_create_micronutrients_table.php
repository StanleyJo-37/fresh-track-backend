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
        Schema::create('micronutrients', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(FoodProduct::class, 'food_product_id');
            $table->float('vitamin_b1');
            $table->float('vitamin_b2');
            $table->float('vitamin_b3');
            $table->float('vitamin_b5');
            $table->float('vitamin_b6');
            $table->float('vitamin_b7');
            $table->float('vitamin_b9');
            $table->float('vitamin_b12');
            $table->float('vitamin_c');
            $table->float('vitamin_a');
            $table->float('vitamin_d');
            $table->float('vitamin_e');
            $table->float('vitamin_k');
            $table->float('iron');
            $table->float('manganese');
            $table->float('copper');
            $table->float('zinc');
            $table->float('iodine');
            $table->float('fluoride');
            $table->float('selenium');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('micronutrients');
    }
};
