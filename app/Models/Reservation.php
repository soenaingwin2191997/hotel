<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'hotel_id',
        'room_id',
        'name',
        'email',
        'phone',
        'nrc',
        'passport',
        'birthday',
        'check_in_date',
        'check_out_date',
    ];
}
