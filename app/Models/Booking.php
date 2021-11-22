<?php

namespace App\Models;

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
        return $this->hasMany(Rooms::class);
    }

    public function rentals()
    {
        return $this->hasMany(Rental::class);
    }
}
