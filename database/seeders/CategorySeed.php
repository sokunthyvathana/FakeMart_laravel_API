<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            ['name' => 'Beverages',
                'description' => 'Drinks and refreshments'],
            ['name' => 'Snacks',
                'description' => 'Sweet and salty snacks'],
        ]);
        //
    }
}
