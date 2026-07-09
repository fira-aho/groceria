<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    // Mengganti nama tabel menjadi 'orders' agar lebih sesuai standar Laravel
    Schema::create('orders', function (Blueprint $table) {
        $table->id(); // Menggunakan id() standar
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Siapa yang order
        $table->string('nama_lengkap', 150);
        $table->string('no_telepon', 20);
        $table->text('alamat');
        $table->string('metode_pembayaran');
        $table->integer('total_price');
        $table->timestamps(); // Otomatis membuat created_at dan updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('orders');
}
};
