<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CheckoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('checkout')->insert([
            [
                'nama_lengkap' => 'Muhammad Rafi Adhiya',
                'no_telepon' => '081234567890',
                'alamat' => 'Tambun, Bekasi',
                'created_at' => now(),
            ],
            [
                'nama_lengkap' => 'Budi Santoso',
                'no_telepon' => '081298765432',
                'alamat' => 'Jakarta Timur',
                'created_at' => now(),
            ],
            [
                'nama_lengkap' => 'Siti Aisyah',
                'no_telepon' => '082112223333',
                'alamat' => 'Depok',
                'created_at' => now(),
            ],
        ]);
    }
}