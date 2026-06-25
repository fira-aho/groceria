<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart'; 

    // Sesuaikan dengan struktur migrasi cart terbaru
    protected $fillable = [
        'product_id', 
        'qty', 
        'subtotal'
    ];

    public $timestamps = false; 

    // Fungsi penting untuk mengambil data produk secara estafet
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}