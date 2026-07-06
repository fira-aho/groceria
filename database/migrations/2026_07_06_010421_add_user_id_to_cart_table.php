<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('cart', function (Blueprint $table) {
            // Tambahkan kolom user_id setelah kolom id
            $table->unsignedBigInteger('user_id')->after('id');
        });
    }

    public function down()
    {
        Schema::table('cart', function (Blueprint $table) {
            // Hapus kolom user_id saat rollback
            $table->dropColumn('user_id');
        });
    }
};