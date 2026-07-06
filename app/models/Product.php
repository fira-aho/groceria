<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'price', 
        'stock', 
        'image'
    ];

    // Mengizinkan semua kolom diisi secara massal kecuali ID
    protected $guarded = ['id']; 
}