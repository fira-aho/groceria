<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    // Nama tabel sekarang adalah 'orders'
    protected $table = 'orders';

    // Primary key sekarang adalah 'id' (standar)
    // Timestamps sekarang diatur otomatis oleh Laravel
    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_telepon',
        'alamat',
        'metode_pembayaran',
        'total_price'
    ];
}