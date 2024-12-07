<?php

namespace App\Http\Controllers;

use App\Models\Restaurante;
use App\Models\Resena;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RestauranteController extends Controller
{
    public function index(Request $request)
    {
    $user = Auth::user();

    if (!$user) {
        return redirect('/')->with('error', 'Debe iniciar sesión para acceder a esta página.');
    }

    if ($user->tipo_usuario === 'cliente') {
        // Realizar una búsqueda si hay un término ingresado
        $query = $request->input('query');
        $restaurantes = Restaurante::when($query, function ($q) use ($query) {
            $q->where('nombre', 'like', "%$query%")
              ->orWhere('direccion', 'like', "%$query%");
        })->get();

        return view('clientes.panel', compact('restaurantes'));
    }

    if ($user->tipo_usuario === 'restaurante') {
        // Mostrar solo restaurantes asociados al usuario autenticado
        $restaurantes = Restaurante::where('user_id', $user->id)->get();

        return view('restaurantes.panel', compact('restaurantes'));
    }

    return redirect('/')->with('error', 'Acceso no autorizado.');
    }

    public function panel()
    {
        $user = Auth::user();

        // Validar que el usuario esté autenticado
        if (!$user) {
            return redirect('/')->with('error', 'Debe iniciar sesión para acceder a esta página.');
        }

        $restaurante = Restaurante::where('user_id', Auth::id())->first(); // Supongamos que hay relación user_id
        $reservasPendientes = Reserva::where('restaurante_id', $restaurante->id)
            ->where('estado', 'pendiente')
            ->get();
        
        return view('panel-restaurantes', compact('restaurante', 'reservasPendientes'));
    }
    // Mostrar formulario para crear un nuevo restaurante
    public function create()
    {
        return view('restaurantes.crear');
    }

    // Guardar un nuevo restaurante con archivo PDF
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:15',
            'tipo_comida' => 'required|string|max:100',
            'menu_pdf' => 'nullable|file|mimes:pdf|max:10240', // PDF opcional
            'user_id' => 'required|exists:users,id', // Validar relación con usuario
        ]);

        $restaurante = new Restaurante();
        $restaurante->fill($validated);

        // Verifica si se ha subido un archivo PDF
        if ($request->hasFile('menu_pdf')) {
            $path = $request->file('menu_pdf')->store('menus', 'public');
            $restaurante->menu_pdf = $path;
        }

        $restaurante->save();

        return redirect()->route('restaurantes.panel')->with('success', 'Restaurante creado exitosamente.'); // Redirige al panel
    }

    // Mostrar un restaurante específico
    public function show(Restaurante $restaurante)
    {
        $restaurante->load('user'); // Cargar relación con usuario
        return view('restaurantes.detalle', compact('restaurante'));
    }

    // Mostrar formulario para editar un restaurante
    public function edit(Restaurante $restaurante)
    {
        return view('restaurantes.edit', compact('restaurante'));
    }

    // Actualizar un restaurante, con opción de cambiar el PDF
    public function update(Request $request, Restaurante $restaurante)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:500',
            'telefono' => 'required|string|max:15',
            'tipo_comida' => 'required|string|max:100',
            'menu_pdf' => 'nullable|file|mimes:pdf|max:10240',
        ]);

        $restaurante->fill($validated);

        if ($request->hasFile('menu_pdf')) {
            if ($restaurante->menu_pdf) {
                Storage::delete('public/' . $restaurante->menu_pdf);
            }
            $path = $request->file('menu_pdf')->store('menus', 'public');
            $restaurante->menu_pdf = $path;
        }

        $restaurante->save();

        return redirect()->route('restaurantes.panel')->with('success', 'Restaurante actualizado exitosamente.'); // Redirige al panel
    }

    // Eliminar un restaurante y su archivo PDF
    public function destroy(Restaurante $restaurante)
    {
        if ($restaurante->menu_pdf) {
            Storage::delete('public/' . $restaurante->menu_pdf);
        }

        $restaurante->delete();
        return redirect()->route('restaurantes.panel')->with('success', 'Restaurante eliminado exitosamente.'); // Redirige al panel
    }
}