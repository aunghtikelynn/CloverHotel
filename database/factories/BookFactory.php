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
            'booking_no'=>$this->faker->ean8,
            'name'=>$this->faker->word,
            'email'=>$this->faker->word,
            'phone'=>$this->faker->phoneNumber,
            'adult'=>$this->faker->word,
            'child'=>$this->faker->word,
            'check_in'=>$this->faker->date,
            'check_out'=>$this->faker->date,
            'qty'=>rand(1,3),
            'total'=>$this->faker->numberBetween(300000, 900000),
            'payment_type'=>$this->faker->word,
            'payment_slip'=>$this->faker->imageUrl,
            'room_id'=>rand(1, 5),
            'payment_id'=>rand(1, 5),
            'message'=>$this->faker->word,
            'status' => $this->faker->word,
        ];
    }
}
