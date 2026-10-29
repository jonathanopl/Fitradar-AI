<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    use HasFactory;

    protected $table = 'rekomendasi';

    // Jika kamu menggunakan kolom timestamps (created_at dan updated_at)
    public $timestamps = true;

    // Kolom yang bisa diisi secara massal
    protected $fillable = [
        'user_id',
        'nama_olahraga',
        'deskripsi',
        'dari_ai', // opsional, misalnya buat menandai apakah dari AI atau manual
    ];
}
