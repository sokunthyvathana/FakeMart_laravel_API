<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;

class BranchSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('branches')->truncate();
        DB::table('branches')->insert([
            [
                'name' => 'FakeMart',
                'location' => 'PhnomPenh',
                'contact_number' => '0987654321',
            ]


        ]);

        //
    }
}
