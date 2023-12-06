<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alimentos extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'alimento_consumido',
        'cantidad',
        'calorias_promedio',
        'fecha_hora',
    ];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
