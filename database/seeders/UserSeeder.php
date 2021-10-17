<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

// for created_at and updated_at column value
use Carbon\Carbon;

// For sql query
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'account_type' => 'admin',
                'username' => 'admin',
                'firstname' => 'Fadmin',
                'lastname' => 'Ladmin',
                'contact_number' => '0912312312',
                'address' => 'admin address',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'account_type' => 'employee',
                'username' => 'employee',
                'firstname' => 'Femployee',
                'lastname' => 'Lemployee',
                'contact_number' => '0912312313',
                'address' => 'employee address',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('employee'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
            [
                'account_type' => 'user',
                'username' => 'user',
                'firstname' => 'Fuser',
                'lastname' => 'Luser',
                'contact_number' => '0912312314',
                'address' => 'user adress',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user'),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ],
        ];
    
        User::insert($users);
    }

    private function isAdmin(Bool $isAdmin)
    {
        if ($isAdmin) {
            return 'admin';
        }
        return 'user';
    }
}
