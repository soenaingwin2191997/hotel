<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomFeature extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'air_con',
        'fun',
        'wifi',
        'tv',
        'breakfast',
        'lunch',
        'bathroom',
        'city_view',
        'toilet',
        'windows',
    ];
}
