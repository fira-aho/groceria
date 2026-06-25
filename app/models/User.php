<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Tentukan kolom apa saja yang boleh diisi
    protected $fillable = [
        'name', 
        'email',
        'password',
    ];

    // Sembunyikan password saat data user dipanggil
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Beritahu Laravel bahwa kolom password harus selalu di-hash
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
