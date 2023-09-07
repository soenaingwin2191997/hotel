<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'township_id',
        'hotel_name',
        'hotel_photo',
        'hotel_desc',
        'hotel_phone',
        'hotel_email',
        'hotel_address',
        'hotel_map',
    ];
}
