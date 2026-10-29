<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'birthdate',
        'height',
        'weight',
        'bmi',
        'activity_level',
    ];

    // Relasi ke User (1:1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
