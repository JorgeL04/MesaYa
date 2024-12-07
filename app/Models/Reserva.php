<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'id_restaurante', 'fecha_reserva', 'numero_personas'
    ];

    // Relación inversa con el usuario que hizo la reserva
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relación inversa con el restaurante en el que se hizo la reserva
    public function restaurante()
    {
        return $this->belongsTo(Restaurante::class, 'id_restaurante');
    }
}
