<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'room_id',
        'rental_id',
        'payment_method',
        'total_price',
        'transaction_status',
        'title',
        'start',
        'end',
        'description',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
