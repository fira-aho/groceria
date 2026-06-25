<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Menentukan nama tabel di database lama kamu
    protected $table = 'cart'; 

    // Daftar kolom yang diizinkan untuk diisi data secara massal
    protected $fillable = [
        'product_name', 
        'price', 
        'qty', 
        'subtotal', 
        'image'
    ];

    // Matikan timestamps karena tabel lamamu tidak punya kolom created_at & updated_at bawaan Laravel
    public $timestamps = false; 
}