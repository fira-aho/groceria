<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products_recomendations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade'); // kalau produk asli dihapus, rekomendasi ikut terhapus
            $table->string('badge')->nullable(); // contoh: "Baru", "Diskon"
            $table->integer('urutan')->default(0); // opsional, untuk mengatur urutan tampil
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products_recomendations');
    }
};