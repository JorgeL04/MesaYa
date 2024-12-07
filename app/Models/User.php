<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'name', // Nombre del usuario
        'email', // Correo
        'password', // Contraseña
        'tipo_usuario', // Tipo de usuario (cliente o restaurante)
        'telefono', // Teléfono opcional
    ];

    // Ocultar ciertos atributos al serializar el modelo
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    // Relación con las reservas (un usuario puede tener muchas reservas)
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'user_id');
    }

    // Si el usuario es un restaurante, relación uno a uno con la tabla de restaurantes
    public function restaurante()
    {
        return $this->hasOne(Restaurante::class, 'user_id');
    }

    // Relación con las reseñas que ha dejado el usuario
    public function resenas()
    {
        return $this->hasMany(Resena::class, 'user_id');
    }
}
