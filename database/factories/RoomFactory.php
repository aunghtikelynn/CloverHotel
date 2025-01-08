<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->word,
            'image'=>$this->faker->imageUrl,
            'description'=>$this->faker->paragraph,
            'service'=>$this->faker->word,
            'price'=>$this->faker->numberBetween(300000, 900000),
        ];
    }
}
