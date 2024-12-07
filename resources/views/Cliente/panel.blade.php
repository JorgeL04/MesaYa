@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Barra de navegación -->
    <div class="d-flex justify-content-between align-items-center py-3">
        <!-- Barra de búsqueda -->
        <form action="{{ route('restaurantes.panel') }}" method="GET" class="d-flex w-50">
            <input type="text" name="query" id="query" class="form-control me-2" placeholder="Buscar restaurantes..." value="{{ request('query') }}">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <!-- Botones de acción -->
        <div class="d-flex gap-2">
            <a href="{{ route('reservas.gestionar') }}" class="btn btn-secondary">Mis Reservas</a>
            <a href="{{ route('resenas.dejar') }}" class="btn btn-secondary">Dejar Reseña</a>
        </div>
    </div>

    <!-- Listado de restaurantes -->
    <div class="row mt-4">
        @if($restaurantes->isEmpty())
            <p>No se encontraron restaurantes.</p>
        @else
            @foreach($restaurantes as $restaurante)
                <div class="col-12 mb-3">
                    <div class="card shadow-sm">
                        <div class="row g-0">
                            <!-- Imagen del restaurante -->
                            <div class="col-md-4">
                                <img src="{{ $restaurante->imagen_url ?? asset('images/default_restaurant.jpg') }}" class="img-fluid rounded-start" alt="Imagen de {{ $restaurante->nombre }}">
                            </div>
                            <!-- Detalles del restaurante -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $restaurante->nombre }}</h5>
                                    <p class="card-text">
                                        <strong>Dirección:</strong> {{ $restaurante->direccion }}<br>
                                        <strong>Tipo de comida:</strong> {{ $restaurante->tipo_comida }}
                                    </p>
                                    <a href="{{ route('restaurantes.detalle', $restaurante->id) }}" class="btn btn-primary">Ver más</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
@endsection
