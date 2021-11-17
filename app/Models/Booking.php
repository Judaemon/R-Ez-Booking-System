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
        'start',
        'end',
        'description',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}