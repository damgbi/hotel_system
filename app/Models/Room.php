<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'external_id',
        'hotel_id',
        'name',
        'inventory_count'
    ];

    public function hotel()
    {
        return $this->belongsTo(\App\Models\Hotel::class);
    }

    public function reservations()
    {
        return $this->hasMany(\App\Models\Reservation::class);
    }
}
