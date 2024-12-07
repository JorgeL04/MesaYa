<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Resena extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'id_restaurante', 'calificacion', 'comentario'
    ];

    // Relación inversa con el usuario que dejó la reseña
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación inversa con el restaurante reseñado
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'id_restaurante');
    }
}
