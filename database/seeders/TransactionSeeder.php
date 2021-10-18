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
        ];

        Transactions::insert($transactions);
    }
}
