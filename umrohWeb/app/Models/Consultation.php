<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = [
        'nama',
        'email',
        'no_hp',
        'pesan',
        'status',
        'tanggal'
    ];

    // ❌ JANGAN tambahkan relasi `user()` karena tidak ada `user_id`
}