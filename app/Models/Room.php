<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_number',
        'room_photo',
        'room_price',
        'room_bad',
        'room_person',
        'room_floor',
        'room_status',
        'room_desc',
    ];
}
