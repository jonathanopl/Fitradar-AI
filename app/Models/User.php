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

    // Relasi ke HealthData (1:1)
    public function healthData()
    {
        return $this->hasOne(HealthData::class);
    }

    // Relasi ke Rekomendasi Makanan (1:1)
    public function rekomendasiMakanan()
    {
        return $this->hasOne(RekomendasiMakanan::class);
    }
}