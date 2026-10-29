<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekomendasiMakanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // user_id yang menghubungkan dengan User
        'makanan', // Nama makanan
        'deskripsi', // Deskripsi makanan
        'kalori', // Kalori makanan
        'protein', // Protein makanan
        'karbohidrat', // Karbohidrat makanan
        'serat', // Serat makanan
        'lemak', // Lemak makanan
        'waktu_makan',
        'tanggal',  
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
