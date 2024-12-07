@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Título del restaurante -->
    <div class="text-center my-4">
        <h1 class="display-4">{{ $restaurante->nombre }}</h1>
    </div>

    <!-- Imagen principal del restaurante -->
    <div class="text-center mb-4">
        <img src="{{ $restaurante->imagen_url ?? asset('images/default_restaurant.jpg') }}" alt="Imagen de {{ $restaurante->nombre }}" class="img-fluid rounded">
    </div>

    <!-- Contenido principal -->
    <div class="row">
        <!-- Columna izquierda: Reseñas -->
        <div class="col-md-4">
            <h3>Reseñas de Clientes</h3>
            @forelse($resenas as $resena)
                <div class="card mb-3">
                    <div class="card-body">
                        <p><strong>{{ $resena->usuario->nombre }}</strong></p>
                        <p>{{ $resena->comentario }}</p>
                    </div>
                </div>
            @empty
                <p>No hay reseñas disponibles.</p>
            @endforelse
        </div>

        <!-- Columna derecha: Detalles y horarios -->
        <div class="col-md-8">
            <!-- Horarios disponibles -->
            <div class="mb-4">
                <h3>Horarios disponibles</h3>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($horarios as $horario)
                        <div class="p-2 bg-light border rounded">
                            {{ $horario }}
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Casilla de detalles -->
            <div class="card mb-4">
                <div class="card-body">
                    <h4>Detalles</h4>
                    <p><strong>Tipo de comida:</strong> {{ $restaurante->tipo_comida }}</p>
                    <p><strong>Rango de precio promedio:</strong> {{ $restaurante->rango_precio }}</p>
                </div>
            </div>

            <!-- Ubicación y menú PDF -->
            <div class="mb-4 d-flex justify-content-between">
                <div>
                    <h4>Ubicación</h4>
                    <p>{{ $restaurante->direccion }}</p>
                </div>
                <div>
                    <a href="{{ asset($restaurante->menu_pdf) }}" class="btn btn-primary" download>
                        Descargar Menú en PDF
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón para hacer una reserva -->
    <div class="text-center mt-4">
        <a href="{{ route('reservas.crear', $restaurante->id) }}" class="btn btn-success btn-lg">
            Hacer una Reserva
        </a>
    </div>
</div>
@endsection
