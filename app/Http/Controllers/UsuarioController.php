<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    
    // Punto de entrada al módulo de usuarios
    public function index()
    {
        $user = Auth::user();
        if ($user->tipo_usuario === 'cliente') {
            return redirect()->route('reservas.index');
        } elseif ($user->tipo_usuario === 'restaurante') {
            return redirect()->route('restaurantes.index');
        }

        return redirect('/')->with('error', 'Acceso no autorizado.');
    }

    // Crear un nuevo usuario
    public function create()
    {
        return view('usuarios.create');
    }

    // Guardar el nuevo usuario
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'tipo_usuario' => 'required|in:cliente,restaurante',
            'telefono' => 'nullable|max:15',
        ]);

        // Creación del usuario
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'tipo_usuario' => $validated['tipo_usuario'],
            'telefono' => $validated['telefono'] ?? null, // Asegura que sea opcional
        ]);

        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    // Mostrar un usuario específico
    public function show(User $user)
    {
        return view('usuarios.show', compact('user'));
    }

    // Editar un usuario
    public function edit(User $user) 
    {
        return view('usuarios.edit', compact('user'));
    }

    // Actualizar un usuario
    public function update(Request $request, User $user) 
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
            'telefono' => 'nullable|max:15',
        ]);

        // Actualización de datos
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->telefono = $validated['telefono'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    // Eliminar un usuario
    public function destroy(User $user) 
    {
        $user->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
