<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelFeature extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'pool',
        'spa',
        'gyn',
        'bar',
        'city_view',
        'elevator',
        'car_parking',
        'wifi',
        'restaurant',
        'air_con',
    ];
}
