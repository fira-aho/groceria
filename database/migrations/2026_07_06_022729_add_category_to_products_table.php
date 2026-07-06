<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Tambah kolom kategori setelah kolom name
            $table->enum('category', [
                'Makanan',
                'Minuman', 
                'Perawatan Tubuh',
                'Kebutuhan Rumah'
            ])->nullable()->after('name');
        });
    }

    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Hapus kolom category saat rollback
            $table->dropColumn('category');
        });
    }
};