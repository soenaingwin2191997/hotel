<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HotelFeature>
 */
class HotelFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_id'=>rand(1,50),
            'pool'=>rand(0,1),
            'spa'=>rand(0,1),
            'gyn'=>rand(0,1),
            'city_view'=>rand(0,1),
            'bar'=>rand(0,1),
            'elevator'=>rand(0,1),
            'car_parking'=>rand(0,1),
            'wifi'=>rand(0,1),
            'restaurant'=>rand(0,1),
            'air_con'=>rand(0,1),
        ];
    }
}
