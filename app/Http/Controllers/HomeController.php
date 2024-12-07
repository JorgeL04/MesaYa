<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Redirige al panel correspondiente según el tipo de usuario.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Validar el tipo de usuario y redirigir a la vista adecuada
        if ($user->tipo_usuario === 'cliente') {
            return view('cliente.panel'); // Vista para clientes
        } elseif ($user->tipo_usuario === 'restaurante') {
            return view('restaurantes.panel'); // Vista para restaurantes
        }

        // Redirigir a una página genérica en caso de error
        return redirect('/')->with('error', 'Tipo de usuario desconocido.');
    }
}