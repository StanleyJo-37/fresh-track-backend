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
            $table->float('vitamin_b1')->nullable();
            $table->float('vitamin_b2')->nullable();
            $table->float('vitamin_b3')->nullable();
            $table->float('vitamin_b5')->nullable();
            $table->float('vitamin_b6')->nullable();
            $table->float('vitamin_b7')->nullable();
            $table->float('vitamin_b9')->nullable();
            $table->float('vitamin_b12')->nullable();
            $table->float('vitamin_c')->nullable();
            $table->float('vitamin_a')->nullable();
            $table->float('vitamin_d')->nullable();
            $table->float('vitamin_e')->nullable();
            $table->float('vitamin_k')->nullable();
            $table->float('iron')->nullable();
            $table->float('manganese')->nullable();
            $table->float('copper')->nullable();
            $table->float('zinc')->nullable();
            $table->float('iodine')->nullable();
            $table->float('fluoride')->nullable();
            $table->float('selenium')->nullable();
            $table->timestamp('created_at')->useCurrent()->nullable();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate()->nullable();
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
