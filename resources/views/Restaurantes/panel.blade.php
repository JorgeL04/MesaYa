@extends('layouts.app')

@section('content')
<x-app-main>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <!-- Logo y nombre -->
            <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo MesaYa" class="me-2" style="width: 50px;">
                <span class="h4 text-danger">MesaYa</span>
            </a>

            <!-- Botones en el lado derecho -->
            <div class="d-flex ms-auto">
                <a href="{{ route('reservas.gestionar') }}" class="btn btn-outline-danger me-3">Gestionar Reservas</a>
                <a href="{{ route('resenas.ver') }}" class="btn btn-outline-danger me-3">Ver Reseñas Recibidas</a>
                <a href="{{ route('cliente.editar') }}" class="btn btn-outline-danger">Editar Perfil</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <!-- Recuadro de la izquierda -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-danger text-white">
                        <h5>Crear Restaurante</h5>
                    </div>
                    <div class="card-body">
                        @if(isset($restaurante) && $restaurante)
                            <p><strong>Restaurante: </strong>{{ $restaurante->nombre }}</p>
                            <p><strong>Descripción: </strong>{{ $restaurante->descripcion }}</p>
                            <a href="{{ route('restaurantes.detalle', $restaurante->id) }}" class="btn btn-outline-danger w-100">
                                Detalles del Restaurante
                            </a>
                        @else
                            <p class="text-center text-muted">No tienes un restaurante creado aún.</p>
                            <a href="{{ route('restaurantes.crear') }}" class="btn btn-danger w-100">
                                Crear Restaurante
                            </a>
                        @endif
                        <!-- Ver Menú -->
                        @if(isset($restaurante) && $restaurante)
                            <div class="mt-3">
                                <a href="{{ route('restaurantes.menu', $restaurante->id) }}" class="btn btn-outline-danger w-100">
                                    Ver Menú
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recuadro de la derecha -->
            <div class="col-md-6">
                <!-- Resumen de Reservas Pendientes -->
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-warning text-white">
                        <h5>Resumen de Reservas Pendientes</h5>
                    </div>
                    <div class="card-body">
                        @if(isset($reservasPendientes) && $reservasPendientes->count() > 0)
                            <ul class="list-group">
                                @foreach($reservasPendientes as $reserva)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <div>
                                            <strong>{{ $reserva->cliente->nombre }}</strong> 
                                            - {{ $reserva->fecha }}
                                        </div>
                                        <div>
                                            <a href="{{ route('reserva.confirmar', $reserva->id) }}" class="btn btn-success btn-sm">
                                                Confirmar
                                            </a>
                                            <a href="{{ route('reserva.cancelar', $reserva->id) }}" class="btn btn-danger btn-sm">
                                                Cancelar
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center text-muted">No hay reservas pendientes.</p>
                        @endif
                    </div>
                </div>

                <!-- Reseñas Recibidas -->
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5>Reseñas Recibidas</h5>
                    </div>
                    <div class="card-body">
                        @if(isset($reseñas) && $reseñas->count() > 0)
                            <ul class="list-group">
                                @foreach($reseñas as $resena)
                                    <li class="list-group-item">
                                        <strong>{{ $resena->cliente->nombre }}</strong> 
                                        - {{ $resena->calificacion }} estrellas
                                        <p>{{ $resena->comentario }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-center text-muted">No hay reseñas para este restaurante.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-main>
@endsection
