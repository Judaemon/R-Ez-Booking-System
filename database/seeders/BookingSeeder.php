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
                'amount_paid' => '2500',
                'total_price' => '2500',
                'booking_status' => 'On-going',
                'address' => '18-A Saint Joseph Street, Purok 24-A, Lower, San Carlos Heights, Baguio',
                'adult' => '2',
                'children' => '1',
                'start' => '2021-11-17',
                'end' => '2021-11-26',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '4',
                'payment_method' => 'Bank Transfer',
                'amount_paid' => '3000',
                'total_price' => '3000',
                'booking_status' => 'On-going',
                'address' => '21-M Ponce, Baguio, Benguet',
                'adult' => '2',
                'children' => '1',
                'start' => '2021-11-24',
                'end' => '2021-12-1',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '3',
                'payment_method' => 'Bank Transfer',
                'amount_paid' => '0',
                'total_price' => '2000',
                'booking_status' => 'Declined',
                'address' => '#11 M Ponce St, Baguio, 2600 Benguet',
                'adult' => '5',
                'children' => '3',
                'start' => '2021-11-23',
                'end' => '2021-12-3',
                'description' => 'Transaction Description',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'user_id' => '4', 
                'payment_method' => 'GCash',
                'amount_paid' => '1000',
                'total_price' => '1000',
                'booking_status' => 'Booked',
                'address' => 'Barangay Salaza, Palauig, Zambales',
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
                'address' => 'Tabora St, Tondo, Manila, Metro Manila',
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
                'amount_paid' => '6000',
                'total_price' => '6000',
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
                'amount_paid' => '0',
                'total_price' => '1000',
                'booking_status' => 'Pending',
                'address' => 'Masinloc, 2200 Zambales',
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
                'amount_paid' => '0',
                'total_price' => '15000',
                'booking_status' => 'Pending',                                                                                                                          
                'address' => '217 Asinan, Bugallon, 2416 Pangasinan',
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