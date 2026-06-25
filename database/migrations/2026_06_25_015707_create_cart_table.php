<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            
            // Menghubungkan tabel cart dengan tabel products
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            
            $table->integer('qty');
            
            // Kolom subtotal boleh tetap ada untuk mempercepat kalkulasi sistem
            $table->integer('subtotal'); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cart');
    }
};