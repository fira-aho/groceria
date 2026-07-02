<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsRecomendationSeeder extends Seeder
{
    public function run(): void
    {
        // Ambil beberapa product_id yang sudah ada di tabel products
        $productIds = DB::table('products')->pluck('id');

        $badges = ['Baru', 'Diskon', 'Best Seller', null];

        foreach ($productIds->take(8) as $index => $id) {
            DB::table('products_recomendations')->insert([
                'product_id' => $id,
                'badge' => $badges[$index % count($badges)],
                'urutan' => $index,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}