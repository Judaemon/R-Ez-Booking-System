<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// for created_at and updated_at column value
use Carbon\Carbon;

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
                'rental_type' => 'ATV Solo',
                'rental_count' => '1',
                'price' => '800.00',                            //per hour
                'description' => 'Enjoy the thrilling and adrenaline pumping trails that we have for you.',
                'image_paths' => json_encode(['rentals/ATV_Solo/atv_rental.jpg', 'rentals/ATV_Solo/atv_rental.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rental_type' => 'ATV With Backride',
                'rental_count' => '1',
                'price' => '1200.00',                           //per hour
                'description' => 'Ride with a partner over the sand and dirt.',
                'image_paths' => json_encode(['rentals/ATV_Solo/atv_rental.jpg', 'rentals/ATV_Solo/atv_rental.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [   
                'rental_type' => 'Tent',
                'rental_count' => '1',
                'price' => '550.00',
                'description' => 'Experience the great outdoors and relax as you hear the waves roll in front of you.',
                'image_paths' => json_encode(['rentals/Tent/tent_rental.jpg', 'rentals/Tent/tent_rental.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rental_type' => 'Volleyball',
                'rental_count' => '1',
                'price' => '250.00',                           //per 2 hours
                'description' => 'Have a fun and exciting match with your friends.',
                'image_paths' => json_encode(['rentals/Volleyball/volleyball_rental.jpg', 'rentals/Volleyball/volleyball_rental.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'rental_type' => 'Surf',
                'rental_count' => '1',
                'price' => '1000.00',                          //board and instructor
                'description' => 'Ride the incredible waves of Liwliwa.',
                'image_paths' => json_encode(['rentals/Surf/surf_rental.jpg', 'rentals/Surf/surf_rental.jpg']),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Rental::insert($rentals);
    }
}
