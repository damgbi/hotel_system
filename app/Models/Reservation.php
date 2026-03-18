<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'external_id',
        'hotel_id',
        'room_id',
        'customer_first_name',
        'customer_last_name',
        'arrival_date',
        'departure_date',
        'total_price'
    ];

    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class);
    }

    public function room()
    {
        return $this->belongsTo(\App\Models\Room::class);
    }
}
