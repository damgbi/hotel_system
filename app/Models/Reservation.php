<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'external_id',
        'hotel_id',
        'costumer_first_name',
        'costumer_last_name',
        'arrival_date',
        'departure_date',
        'total_price'
    ];
}
