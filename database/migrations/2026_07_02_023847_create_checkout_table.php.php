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
    Schema::create('checkout', function (Blueprint $table) {
        $table->id('id_checkout');
        $table->string('nama_lengkap', 150);
        $table->string('no_telepon', 20);
        $table->text('alamat');
        $table->timestamp('created_at')->useCurrent();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::dropIfExists('checkout');
}
};
