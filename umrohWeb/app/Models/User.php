<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'no_hp',   // ✅ tambahan
        'role',    // ✅ tambahan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ✅ Helper role
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isAgen()
    {
        return $this->role === 'agen';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    // ✅ Relasi (opsional tapi disarankan)
    public function consultations()
    {
        return $this->hasMany(\App\Models\Consultation::class);
    }
}