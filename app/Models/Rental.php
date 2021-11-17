<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'rental_type',
        'rental_count',
        'price',
        'description',
        'image_path',
    ];

    public function bookings() 
    {
        return $this->belongsToMany(Booking::class);
    }
}
