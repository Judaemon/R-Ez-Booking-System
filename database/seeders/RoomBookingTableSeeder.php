<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoomBookingTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('room_booking')->delete();
        
        $room_booking = [
            [
                'booking_id' => 1,
                'room_id' => 1,
                'start' => '2021-11-22',
                'end' => '2021-11-26',
            ],
            [
                'booking_id' => 1,
                'room_id' => 1,
                'start' => '2021-11-22',
                'end' => '2021-11-26',
            ],
            [
                'booking_id' => 1,
                'room_id' => 3,
                'start' => '2021-11-22',
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
                'room_id' => 2,
                'start' => '2021-12-5',
                'end' => '2021-12-8',
            ],
            [
                'booking_id' => 5,
                'room_id' => 3,
                'start' => '2021-12-9',
                'end' => '2021-12-11',
            ],
            [
                'booking_id' => 5,
                'room_id' => 3,
                'start' => '2021-12-12',
                'end' => '2021-12-13',
            ],
        ];

        DB::table('room_booking')->insert($room_booking);
    }
}
