<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Room;
use App\Models\Guest;
use App\Models\Hotel;
use App\Models\HotelFeature;
use App\Models\HotelPhoto;
use App\Models\Reservation;
use App\Models\RoomFeature;
use App\Models\RoomPhoto;
use App\Models\Township;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
        ]);

        Township::factory(20)->create();
        Hotel::factory(50)->create();
        Room::factory(300)->create();
        Guest::factory(500)->create();
        Reservation::factory(500)->create();
        HotelPhoto::factory(300)->create();
        RoomPhoto::factory(1000)->create();
        HotelFeature::factory(300)->create();
        RoomFeature::factory(500)->create();
    }
}
