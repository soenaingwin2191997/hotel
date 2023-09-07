<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
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

            'hotel_id' => rand(1, 50),
            'room_number' => rand(1, 1000),
            'room_photo' => "room" . rand(1, 20) . ".jpg",
            'room_price' => rand(40000, 300000),
            'room_bad' => rand(1, 2),
            'room_person' => rand(2, 10),
            'room_floor' => rand(1, 30),
            'room_status' => rand(1, 3),
            'room_type'=>rand(1,3),
            'room_desc' => $this->faker->paragraph(),

        ];
    }
}
