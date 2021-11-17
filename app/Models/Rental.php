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
        'image_paths',
    ];
    public function setFilenamesAttribute($value){
        $this->attributes['image_paths'] = json_encode($value);
    }
}
