<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductCategorySeeder extends Seeder
{
    public function run()
    {
        // Makanan
        DB::table('products')->whereIn('id', [2,7,12,13,14,22])->update(['category' => 'Makanan']);

        // Minuman
        DB::table('products')->whereIn('id', [1,3,4,9,10,11,20,21,24])->update(['category' => 'Minuman']);

        // Perawatan Tubuh
        DB::table('products')->whereIn('id', [15,16,17])->update(['category' => 'Perawatan Tubuh']);

        // Kebutuhan Rumah
        DB::table('products')->whereIn('id', [5,6,8,18,19,23])->update(['category' => 'Kebutuhan Rumah']);
    }
}