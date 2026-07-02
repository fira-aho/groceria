<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';
    
    // Matikan fitur otomatis timestamps karena tabelmu tidak punya kolom created_at/updated_at
    public $timestamps = false; 

    protected $fillable = [
        'user_id', 
        'product_id', 
        'qty', 
        'subtotal'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}