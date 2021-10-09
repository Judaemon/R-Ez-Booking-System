<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// For sql query
use Illuminate\Support\Facades\DB;

use App\Models\Rental;

class RentalSeeder extends Seeder
{
    public function run()
    {
        DB::table('rentals')->delete();

        $rentals = [
            [
                'name' => 'RentalName',
                'price' => '0.00',
                'description' => 'RentalDescription',
                'picture' => 'RentalPicture',
            ],
            [
                'name' => 'ATV Solo',
                'price' => '800.00',                            //per hour
                'description' => 'Enjoy the thrilling and adrenaline pumping trails that we have for you.',
                'picture' => 'RentalPicture',
            ],
            [
                'name' => 'ATV With Backride',
                'price' => '1200.00',                           //per hour
                'description' => 'Ride with a partner over the sand and dirt.',
                'picture' => 'RentalPicture',
            ],
            [
                'name' => 'Tent',
                'price' => '550.00',
                'description' => 'Experience the great outdoors and relax as you hear the waves roll in front of you.',
                'picture' => 'RentalPicture',
            ],
            [
                'name' => 'Volleyball',
                'price' => '250.00',                           //per 2 hours
                'description' => 'Have a fun and exciting match with your friends.',
                'picture' => 'RentalPicture',
            ],
            [
                'name' => 'Surf',
                'price' => '1000.00',                          //board and instructor
                'description' => 'Ride the incredible waves of Liwliwa.',
                'picture' => 'RentalPicture',
            ],
            
        ];

        Rental::insert($rentals);
    }
}
