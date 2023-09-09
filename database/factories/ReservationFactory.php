<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>rand(1,20),
            'hotel_id'=>rand(1,50),
            'room_id'=>rand(1,300),
            'check_in_date'=>$this->faker->dateTimeBetween('now','+1 month'),
            'check_out_date'=>$this->faker->dateTimeBetween('now','+1 month'),
        ];
    }
}
