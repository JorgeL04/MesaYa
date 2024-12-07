<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\RestauranteController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ResenaController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/', function () {
    return view('landing');
});

Route::resource('usuarios', UsuarioController::class);
Route::resource('restaurantes', RestauranteController::class);
Route::resource('reservas', ReservaController::class);
Route::resource('resenas', ResenaController::class);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Rutas para el cliente
Route::get('/restaurantes/buscar', [RestauranteController::class, 'buscar'])->name('restaurantes.buscar');
Route::get('/reservas/gestionar', [ReservaController::class, 'gestionar'])->name('reservas.gestionar');
Route::get('/reseñas/dejar', [ResenaController::class, 'dejar'])->name('resenas.dejar');
Route::get('/perfil/editar', [UsuarioController::class, 'editarPerfil'])->name('cliente.editar');
// Rutas para el restaurante
Route::get('/restaurantes/crear', [RestauranteController::class, 'crear'])->name('restaurantes.crear');
Route::get('/reseñas/ver', [ResenaController::class, 'ver'])->name('resenas.ver');
Route::get('/restaurantes/{id}/detalle', [RestauranteController::class, 'detalle'])->name('restaurantes.detalle');

Route::get('/clientes/panel', [RestauranteController::class, 'panelClientes'])->name('cliente.panel');
Route::get('/restaurantes/panel', [RestauranteController::class, 'panelRestaurantes'])->name('restaurantes.panel');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
