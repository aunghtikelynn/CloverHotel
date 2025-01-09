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
            'image-1'=>$this->faker->imageUrl,
            'image-2'=>$this->faker->imageUrl,
            'image-3'=>$this->faker->imageUrl,
            'image-4'=>$this->faker->imageUrl,
            'type_id'=>$this->faker->word,
            'description'=>$this->faker->paragraph,
            'price'=>$this->faker->numberBetween(300000, 900000),
        ];
    }
}
