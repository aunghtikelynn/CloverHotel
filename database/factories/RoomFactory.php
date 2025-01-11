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
            'image_1'=>$this->faker->imageUrl,
            'image_2'=>$this->faker->imageUrl,
            'image_3'=>$this->faker->imageUrl,
            'image_4'=>$this->faker->imageUrl,
            'type_id'=>rand(1, 5),
            'description'=>$this->faker->paragraph,
            'price'=>$this->faker->numberBetween(300000, 900000),
        ];
    }
}
