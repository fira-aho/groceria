<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terhubung dengan model ini.
     */
    protected $table = 'order_items';

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'qty',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}