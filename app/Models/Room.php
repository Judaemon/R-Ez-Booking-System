<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable=[
        'room_type',
        'room_count',
        'price',
        'description',
        'amenities',
        'maximum_capacity',
        'recommended_capacity',
        'image_paths',
    ];

    public function bookings() 
    {
        return $this->belongsToMany(Booking::class);
    }
}
