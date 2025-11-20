<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_paket',
        'harga',
        'durasi',
        'fasilitas',
        'deskripsi',
        'gambar', 
    ];

    // ✅ Accessor (opsional)
    public function getGambarUrlAttribute()
    {
        return $this->gambar 
            ? asset('images/packages/' . $this->gambar)
            : 'https://via.placeholder.com/300x200?text=No+Image';
    }
}