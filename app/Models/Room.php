<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'description',
        'price',
        'recommended_capacity',
    ];

    protected $casts = [
        'image_path',
    ];

    public function bookings() 
    {
        return $this->belongsToMany(Booking::class);
    }
}
