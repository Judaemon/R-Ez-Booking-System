<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// for created_at and updated_at column value
use Carbon\Carbon;

// For sql query
use Illuminate\Support\Facades\DB;

use App\Models\Transactions;


class TransactionSeeder extends Seeder
{
    public function run()
    {
        DB::table('transactions')->delete();
        
        $transactions = [
            [
                'user_id' => '1',
                'room_id' => '1',
                'rental_id' => '1',
                'payment_status' => 'On-going',
                'total_price' => '1',
                'status' => 'Transaction Status',
                'title' => 'Transaction Title',
                'start' => '2021-10-18',
                'end' => '2021-10-21',
                'description' => 'Transaction Description',
            ],
            [
                'user_id' => '2',
                'room_id' => '2',
                'rental_id' => '2',
                'payment_status' => 'Pending',
                'total_price' => '2',
                'status' => 'Transaction Status',
                'title' => 'Transaction Title',
                'start' => '2021-10-25',
                'end' => '2021-10-28',
                'description' => 'Transaction Description',
            ],
            [
                'user_id' => '3',
                'room_id' => '3',
                'rental_id' => '3',
                'payment_status' => 'Cancelled',
                'total_price' => '3',
                'status' => 'Transaction Status',
                'title' => 'Transaction Title',
                'start' => '2021-10-29',
                'end' => '2021-11-1',
                'description' => 'Transaction Description',
            ],
            [
                'user_id' => '4',
                'room_id' => '4',
                'rental_id' => '4',
                'payment_status' => 'Finished',
                'total_price' => '4',
                'status' => 'Transaction Status',
                'title' => 'Transaction Title',
                'start' => '2021-11-5',
                'end' => '2021-11-8',
                'description' => 'Transaction Description',
            ],
        ];

        Transactions::insert($transactions);
    }
}
