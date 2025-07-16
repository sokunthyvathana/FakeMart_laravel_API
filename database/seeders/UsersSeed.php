<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->truncate();
        DB::table('users')->insert([
            [
                'username' => 'adminuser',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_id' => '1',
            ],
            [
                'username' => 'saleuser',
                'email' => 'sales@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password456'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
                'staff_id' => '2',
            ],

        ]);
        //
    }
}
