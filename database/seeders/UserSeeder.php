<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
            ],
            [
                'account_type' => 'user',
                'username' => 'user',
                'firstname' => 'Fuser',
                'lastname' => 'Luser',
                'contact_number' => '0912312313',
                'email' => 'user@gmail.com',
                'password' => Hash::make('user'),
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
