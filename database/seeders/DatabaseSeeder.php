<?php

namespace Database\Seeders;

use App\Models\Transactions;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoomSeeder::class,
            RentalSeeder::class,
            TransactionSeeder::class,
        ]);
    }
}
