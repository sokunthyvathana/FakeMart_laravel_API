<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->truncate();
        DB::table('staff')->insert([
           [
               'position_id' => 1,
               'name' => 'admin',
               'gender' => 'male',
               'dob' => '2000-01-01',
               'pob' => 'KPC',
               'address' => 'PP',
               'phone' => '0987654321',
               'nation_id_card' => '9898989898',
           ],
           [
               'position_id' => 2,
               'name' => 'sale',
               'gender' => 'female',
               'dob' => '2000-01-01',
               'pob' => 'PP',
               'address' => 'PP',
               'phone' => '0987677666',
               'nation_id_card' => '121456898',
           ]

        ]);
        //
    }
}
