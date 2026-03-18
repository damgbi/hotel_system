<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $fillable = [
        'external_id',
        'name'
    ];

    public function rooms()
        {
            return $this->hasMany(\App\Models\Room::class);
        }

    public function reservations()
        {
            return $this->hasMany(\App\Models\Reservation::class);
        }
}

