<?php

namespace App\Models;
use App\Models\Room;
use App\Models\Rental;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'payment_method',
        'amount_paid',
        'total_price',
        'address',
        'adult',
        'children',
        'booking_status',
        'description',
        'start',
        'end',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class);
    }

    public function rentals()
    {
        return $this->belongsToMany(Rental::class);
    }
}
