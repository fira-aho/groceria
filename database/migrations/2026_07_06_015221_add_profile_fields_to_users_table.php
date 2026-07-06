<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Nomor telepon
            $table->string('phone')->nullable()->after('email');
            // Alamat lengkap
            $table->text('address')->nullable()->after('phone');
            // Tanggal lahir
            $table->date('birth_date')->nullable()->after('address');
            // Jenis kelamin
            $table->enum('gender', ['Laki-laki', 'Perempuan'])->nullable()->after('birth_date');
            // Foto profil
            $table->string('avatar')->nullable()->after('gender');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Hapus semua kolom saat rollback
            $table->dropColumn(['phone', 'address', 'birth_date', 'gender', 'avatar']);
        });
    }
};