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
                'user_id' => '3',
                'payment_method' => 'Bank Transfer',
                'amount_paid' => '1',
                'total_price' => '1',
                'booking_status' => 'On-going',
                'address' => 'Baguio',
                'adult' => '2',
                'children' => '1',
                'start' => '2021-11-22',
                'end' => '2021-11-26',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '4',
                'payment_method' => 'Bank Transfer',
                'amount_paid' => '1',
                'total_price' => '1',
                'booking_status' => 'On-going',
                'address' => 'Baguio',
                'adult' => '2',
                'children' => '1',
                'start' => '2021-11-23',
                'end' => '2021-12-1',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '3',
                'payment_method' => 'Bank Transfer',
                'amount_paid' => '1',
                'total_price' => '1',
                'booking_status' => 'Declined',
                'address' => 'Baguio',
                'adult' => '5',
                'children' => '3',
                'start' => '2021-11-23',
                'end' => '2021-12-1',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '4', 
                'payment_method' => 'GCash',
                'amount_paid' => '1',
                'total_price' => '2',
                'booking_status' => 'Booked',
                'address' => 'Manila',
                'adult' => '4',
                'children' => '2',
                'start' => '2021-12-5',
                'end' => '2021-12-8',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '4',
                'payment_method' => 'Bank Transfer',
                'amount_paid' => '1',
                'total_price' => '3',
                'booking_status' => 'Canceled',
                'address' => 'Zambales',
                'adult' => '1',
                'children' => '3',
                'start' => '2021-12-1',
                'end' => '2021-12-4',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '3',
                'payment_method' => 'GCash',
                'amount_paid' => '1',
                'total_price' => '4',
                'booking_status' => 'Finished',
                'address' => 'Zambales',
                'adult' => '5',
                'children' => '',
                'start' => '2021-11-1',
                'end' => '2021-11-6',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '3',
                'payment_method' => 'GCash',
                'amount_paid' => '1',
                'total_price' => '5',
                'booking_status' => 'Pending',
                'address' => 'Baguio',
                'adult' => '10',
                'children' => '',
                'start' => '2021-12-9',
                'end' => '2021-12-11',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '4',
                'payment_method' => 'GCash',
                'amount_paid' => '1',
                'total_price' => '5',
                'booking_status' => 'Pending',
                'address' => 'Pangasinan',
                'adult' => '1',
                'children' => '1',
                'start' => '2021-12-12',
                'end' => '2021-12-13',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];

        Booking::insert($bookings);
    }
}