<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoomBookingTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('booking_room')->delete();
        
        $booking_room = [
            [
                'booking_id' => 1,
                'room_id' => 1  ,
                'start' => '2021-11-17',
                'end' => '2021-11-26',
            ],
            [
                'booking_id' => 1,
                'room_id' => 6,
                'start' => '2021-11-17',
                'end' => '2021-11-26',
            ],
            [
                'booking_id' => 1,
                'room_id' => 5,
                'start' => '2021-11-17',
                'end' => '2021-11-26',
            ],
            [
                'booking_id' => 2,
                'room_id' => 2,
                'start' => '2021-12-5',
                'end' => '2021-12-8',
            ],
            [
                'booking_id' => 2,
                'room_id' => 4,
                'start' => '2021-12-5',
                'end' => '2021-12-8',
            ],
            [
                'booking_id' => 5,
                'room_id' => 3,
                'start' => '2021-11-1',
                'end' => '2021-11-6',
            ],
            [
                'booking_id' => 5,
                'room_id' => 3,
                'start' => '2021-11-1',
                'end' => '2021-11-6',
            ],
            [
                'booking_id' => 5,
                'room_id' => 3,
                'start' => '2021-11-1',
                'end' => '2021-11-6',
            ],
        ];

        DB::table('booking_room')->insert($booking_room);
    }
}
