<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller
{
    // Listar reservas
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo_usuario === 'cliente') {
            $reservas = Reserva::where('user_id', $user->id)->with('restaurante')->get();
            return view('reservas.gestionar', compact('reservas'));
        } elseif ($user->tipo_usuario === 'restaurante') {
            $reservas = Reserva::whereHas('restaurante', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })->with('user')->get();
            return view('reservas.gestionar', compact('reservas'));
        }

        return redirect('/')->with('error', 'Acceso no autorizado.');
    }

    // Crear una nueva reserva
    public function create(Restaurante $restaurante)
    {
        $user = Auth::user();
        if ($user->tipo_usuario !== 'cliente') {
            return redirect('/')->with('error', 'Acceso no autorizado.');
        }
        return view('reservas.create', compact('restaurante'));
    }

    // Guardar una nueva reserva
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_restaurante' => 'required|exists:restaurantes,id',
            'user_id' => 'required|exists:users,id',
            'fecha_reserva' => 'required|date|after:today',
            'numero_personas' => 'required|integer|min:1',
        ]);

        Reserva::create([
            'id_restaurante' => $validated['id_restaurante'],
            'user_id' => $validated['user_id'],
            'fecha_reserva' => $validated['fecha_reserva'],
            'numero_personas' => $validated['numero_personas'],
        ]);

        return redirect()->route('reservas.gestionar')->with('success', 'Reserva creada exitosamente.');
    }

    // Mostrar una reserva específica
    public function show(Reserva $reserva)
    {
        $reserva->load('user', 'restaurante'); // Cargar relaciones
        return view('reservas.show', compact('reserva'));
    }

    // Editar una reserva
    public function edit(Reserva $reserva)
    {
        $usuarios = User::where('tipo_usuario', 'cliente')->get();
        $restaurantes = Restaurante::all();
        return view('reservas.edit', compact('reserva', 'usuarios', 'restaurantes'));
    }

    // Actualizar una reserva
    public function update(Request $request, Reserva $reserva)
    {
        $validated = $request->validate([
            'fecha_reserva' => 'required|date|after:today',
            'numero_personas' => 'required|integer|min:1',
        ]);

        $reserva->update([
            'fecha_reserva' => $validated['fecha_reserva'],
            'numero_personas' => $validated['numero_personas'],
        ]);

        return redirect()->route('reservas.gestionar')->with('success', 'Reserva actualizada exitosamente.');
    }

    // Eliminar una reserva
    public function destroy(Reserva $reserva)
    {
        $reserva->delete();
        return redirect()->route('reservas.gestionar')->with('success', 'Reserva eliminada exitosamente.');
    }
}
