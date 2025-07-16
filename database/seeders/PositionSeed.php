<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;


class PositionSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('positions')->truncate();
        DB::table('positions')->insert([
            [
                'branch_id' => 1,
                'name' => 'Admin',
                'description' => 'use for Admin',
            ],
            [
                'branch_id' => 2,
                'name' => 'Sale',
                'description' => 'use for Sale',
            ]




        ]);

        //
    }
}
