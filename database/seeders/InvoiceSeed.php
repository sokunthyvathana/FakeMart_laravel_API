<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invoices')->truncate();
        DB::table('invoices')->insert([
            [
                'user_id' => 1,
                'created_at' => now(),
                'total' => 1.10,
            ],
            [
                'user_id' => 2,
                'created_at' => now(),
                'total' => 0.60,
            ],
        ]);

        //
    }
}
