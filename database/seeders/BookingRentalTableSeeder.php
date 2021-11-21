<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BookingRentalTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('booking_rental')->delete();

        $booking_rental = [
            [
                'booking_id' => 1,
                'rental_id' => 1,
                'start' => '2021-11-22',
                'end' => '2021-11-26',
            ],
            [
                'booking_id' => 1,
                'rental_id' => 2,
                'start' => '2021-11-22',
                'end' => '2021-11-26',
            ],
            [
                'booking_id' => 2,
                'rental_id' => 3,
                'start' => '2021-12-05',
                'end' => '2021-12-08',
            ],
        ];

        DB::table('booking_rental')->insert($booking_rental);
    }
}
