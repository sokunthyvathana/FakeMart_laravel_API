<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InvoiceItemSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('invoice_items')->truncate();
        DB::table('invoice_items')->insert([
            [
                'invoice_id' => 1,
                'product_id' => 1,
                'qty' => 2,
                'price' => 2,
            ],
            [
                'invoice_id' => 2,
                'product_id' => 2,
                'qty' => 1,
                'price' => 2.50,
            ],
        ]);

        //
    }
}
