<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'checkout';

    protected $fillable = [
        'nama_lengkap',
        'no_telepon',
        'alamat'
    ];

    public $timestamps = false;
}