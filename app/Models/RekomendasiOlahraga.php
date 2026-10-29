<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiOlahraga extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi_olahragas';

    protected $fillable = [
        'user_id',
        'nama',
        'deskripsi',
        'gambar',
        'tanggal',
    ];

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
