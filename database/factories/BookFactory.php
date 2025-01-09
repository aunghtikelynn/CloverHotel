<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class BookFactory extends Factory
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
            'phone'=>$this->faker->phoneNumber,
            'date'=>$this->faker->date,
            'qty'=>$this->faker->numberBetween(1, 3),
            'total'=>$this->faker->numberBetween(300000, 900000),
            'room_id'=>rand(1, 20),
            'payment_id'=>rand(1, 5)
        ];
    }
}
