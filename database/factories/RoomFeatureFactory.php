<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RoomFeature>
 */
class RoomFeatureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'room_id'=>rand(1,300),
            'air_con'=>rand(0,1),
            'fun'=>rand(0,1),
            'wifi'=>rand(0,1),
            'tv'=>rand(0,1),
            'breakfast'=>rand(0,1),
            'lunch'=>rand(0,1),
            'bathroom'=>rand(0,1),
            'city_view'=>rand(0,1),
            'toilet'=>rand(0,1),
            'windows'=>rand(0,1),
        ];
    }
}
