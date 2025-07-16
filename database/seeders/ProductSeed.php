<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'name' => 'Coca Cola',
                'cost' => 0.25,
                'price' => 0.50,
                'image' => 'coca_cola.jpg',
                'description' => 'Refreshing soft drink',
                'category_id' => 1,
            ],
            [
                'name' => 'Lays Chips',
                'cost' => 0.30,
                'price' => 0.60,
                'image' => 'lays.jpg',
                'description' => 'Crispy potato chips',
                'category_id' => 2,
            ],
        ]);
        //
    }
}
