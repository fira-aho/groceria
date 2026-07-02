<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'checkout';

    protected $primaryKey = 'id_checkout';

    public $timestamps = false;

    protected $fillable = [
        'nama_lengkap',
        'no_telepon',
        'alamat'
    ];
}