<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hotel>
 */
class HotelFactory extends Factory
{

    public function definition(): array
    {
        return [
            'township_id'=>rand(1,20),
            'hotel_name'=>$this->faker->name(15),
            'hotel_email'=>$this->faker->email(),
            'hotel_phone'=>$this->faker->phoneNumber(),
            'hotel_desc'=>$this->faker->paragraph(),
            'hotel_address'=>$this->faker->address(),
            'hotel_map'=>$this->faker->text(50),
            'hotel_photo'=>"hotel".rand(1,20).".jpg",
        ];
    }
}
