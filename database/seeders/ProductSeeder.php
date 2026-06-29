<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            ['name' => 'Greek Yogurt Berry', 'price' => 32000, 'stock' => 50, 'image' => 'yogurt.jpg'],
            ['name' => 'Alpukat Mentega', 'price' => 15500, 'stock' => 100, 'image' => 'alpukat.jpg'],
            ['name' => 'Madu Hutan Asli', 'price' => 78000, 'stock' => 30, 'image' => 'madu.jpg'],
            ['name' => 'Susu Almond 1L', 'price' => 45000, 'stock' => 40, 'image' => 'susu.jpg'],
            ['name' => 'Minyak Goreng Bimoli 2L', 'price' => 38000, 'stock' => 50, 'image' => 'minyak.jpg'],
            ['name' => 'Beras Maknyuss 5kg', 'price' => 75000, 'stock' => 30, 'image' => 'beras.jpg'],
            ['name' => 'Indomie Goreng Spesial', 'price' => 3500, 'stock' => 200, 'image' => 'indomie.jpg'],
            ['name' => 'Gulaku Premium 1kg', 'price' => 16000, 'stock' => 100, 'image' => 'gulaku.jpg'],
            ['name' => 'Teh Pucuk Harum 350ml', 'price' => 4000, 'stock' => 120, 'image' => 'tehpucuk.jpg'],
            ['name' => 'Susu Bear Brand 189ml', 'price' => 10500, 'stock' => 80, 'image' => 'bearbreand.jpg'],
            ['name' => 'Aqua Air Mineral 600ml', 'price' => 3500, 'stock' => 150, 'image' => 'aqua.jpg'],
            ['name' => 'Chitato Sapi Panggang 68g', 'price' => 11500, 'stock' => 60, 'image' => 'chitato.jpg'],
            ['name' => 'Oreo Original 133g', 'price' => 10000, 'stock' => 75, 'image' => 'oreo.jpg'],
            ['name' => 'Sari Roti Tawar Spesial', 'price' => 17500, 'stock' => 25, 'image' => 'sariroti.jpg'],
            ['name' => 'Sabun Cair Lifebuoy 450ml', 'price' => 26000, 'stock' => 40, 'image' => 'sabuncair.jpg'],
            ['name' => 'Pepsodent Pasta Gigi 190g', 'price' => 13000, 'stock' => 50, 'image' => 'pepsodent.jpg'],
            ['name' => 'Sunsilk Shampoo Black 170ml', 'price' => 23000, 'stock' => 45, 'image' => 'sunsilk.jpg'],
            ['name' => 'Rinso Anti Noda Cair 700ml', 'price' => 22000, 'stock' => 35, 'image' => 'rinso.jpg'],
            ['name' => 'Sunlight Sabun Cuci Piring', 'price' => 16000, 'stock' => 50, 'image' => 'sunlight.jpg'],
            ['name' => 'Kopi Kapal Api Mix', 'price' => 14000, 'stock' => 60, 'image' => 'kapalapi.jpg'],
            ['name' => 'Kental Manis Frisian Flag', 'price' => 12500, 'stock' => 70, 'image' => 'kentalmanis.jpg'],
            ['name' => 'Cokelat SilverQueen Cashew', 'price' => 16500, 'stock' => 90, 'image' => 'silverqueen.jpg'],
            ['name' => 'Tisu Wajah Paseo 250s', 'price' => 19000, 'stock' => 55, 'image' => 'tisu.jpg'],
            ['name' => 'Tolak Angin Sido Muncul', 'price' => 4500, 'stock' => 100, 'image' => 'tolakangin.jpg'],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
    }
}