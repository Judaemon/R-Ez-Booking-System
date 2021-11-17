<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// for created_at and updated_at column value
use Carbon\Carbon;

use Illuminate\Support\Facades\DB;

use App\Models\Booking;


class BookingSeeder extends Seeder
{
    public function run()
    {
        DB::table('bookings')->delete();
        
        $bookings = [
            [
                'user_id' => '1',
                'payment_method' => 'Bank Transfer',
                'amount_paid' => '1',
                'total_price' => '1',
                'booking_status' => 'On-going',
                'start' => '2021-10-18',
                'end' => '2021-10-21',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            // [
            //     'user_id' => '2',
            //     'payment_method' => 'GCash',
            //     'amount_paid' => '1',
            //     'total_price' => '2',
            //     'transaction_status' => 'Booked',
            //     'start' => '2021-10-25',
            //     'end' => '2021-10-28',
            //     'description' => 'Transaction Description',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
            // [
            //     'user_id' => '3',
            //     'payment_method' => 'Bank Transfer',
            //     'amount_paid' => '1',
            //     'total_price' => '3',
            //     'transaction_status' => 'Cancelled',
            //     'title' => 'Transaction Title',
            //     'start' => '2021-10-29',
            //     'end' => '2021-11-1',
            //     'description' => 'Transaction Description',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
            // [
            //     'user_id' => '2',
            //     'payment_method' => 'GCash',
            //     'amount_paid' => '1',
            //     'total_price' => '4',
            //     'transaction_status' => 'Finished',
            //     'start' => '2021-10-5',
            //     'end' => '2021-10-8',
            //     'description' => 'Transaction Description',
            //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            // ],
        ];

        Booking::insert($bookings);
    }
}
