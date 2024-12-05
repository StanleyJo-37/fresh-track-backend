<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Macromineral>
 */
class MacromineralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'calcium' => rand(0, 150),
            'phosphorus' => rand(0, 150),
            'magnesium' => rand(0, 150),
            'sodium' => rand(0, 150),
            'chloride' => rand(0, 150),
            'potassium' => rand(0, 150),
            'sulfur' => rand(0, 150),
        ];
    }
}
