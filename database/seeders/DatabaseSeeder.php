<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RoomSeeder::class,
            RentalSeeder::class,
            BookingSeeder::class,
            RoomBookingTableSeeder::class,
            BookingRentalTableSeeder::class,
        ]);
    }
}
