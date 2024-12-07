<?php

namespace App\Http\Controllers;

use App\Models\Resena;
use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResenaController extends Controller
{
    // Listar reseñas
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo_usuario === 'cliente') {
            $resenas = Resena::where('user_id', $user->id)->get();
        } elseif ($user->tipo_usuario === 'restaurante') {
            $resenas = Resena::whereHas('restaurante', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->get();
        } else {
            return redirect('/')->with('error', 'Acceso no autorizado.');
        }

        return view('resenas.index', compact('resenas'));
    }

    // Crear una nueva reseña
    public function create()
    {
        $user = Auth::user();
        if ($user->tipo_usuario !== 'cliente') {
            return redirect('/')->with('error', 'Acceso no autorizado.');
        }
        return view('resenas.create');
    }

    // Guardar una nueva reseña
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_restaurante' => 'required|exists:restaurantes,id',
            'user_id' => 'required|exists:users,id',
            'comentario' => 'required|string|max:500',
            'puntuacion' => 'required|integer|min:1|max:5',
        ]);

        Resena::create([
            'id_restaurante' => $validated['id_restaurante'],
            'user_id' => $validated['user_id'],
            'comentario' => $validated['comentario'],
            'puntuacion' => $validated['puntuacion'],
        ]);

        return redirect()->route('resenas.index')->with('success', 'Reseña creada exitosamente.');
    }

    // Mostrar una reseña específica
    public function show(Resena $resena)
    {
        return view('resenas.show', compact('resena'));
    }

    // Editar una reseña
    public function edit(Resena $resena)
    {
        $usuarios = User::where('tipo_usuario', 'cliente')->get(); // Usuarios clientes
        $restaurantes = Restaurante::all(); // Restaurantes
        return view('resenas.edit', compact('resena', 'usuarios', 'restaurantes'));
    }

    // Actualizar una reseña
    public function update(Request $request, Resena $resena)
    {
        $validated = $request->validate([
            'comentario' => 'required|string|max:500',
            'puntuacion' => 'required|integer|min:1|max:5',
        ]);

        $resena->update([
            'comentario' => $validated['comentario'],
            'puntuacion' => $validated['puntuacion'],
        ]);

        return redirect()->route('resenas.index')->with('success', 'Reseña actualizada exitosamente.');
    }

    // Eliminar una reseña
    public function destroy(Resena $resena)
    {
        $resena->delete();
        return redirect()->route('resenas.index')->with('success', 'Reseña eliminada exitosamente.');
    }
}
