<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Restaurante extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nombre', 'direccion', 'telefono', 'tipo_comida', 'menu_pdf'
    ];

    public function detalle($id)
{
    $restaurante = Restaurante::findOrFail($id);
    $resenas = Resena::where('restaurante_id', $id)->get();
    $horarios = ['10:00 AM', '12:00 PM', '2:00 PM', '6:00 PM', '8:00 PM']; // Ejemplos de horarios

    return view('restaurantes.detalle', compact('restaurante', 'resenas', 'horarios'));
}

    // Relación de un restaurante con sus reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class, 'id_restaurante');
    }

    // Relación de un restaurante con las reseñas que ha recibido
    public function resenas()
    {
        return $this->hasMany(Resena::class, 'id_restaurante');
    }

    // Relación inversa (de 1 a 1) con la tabla de usuarios
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
