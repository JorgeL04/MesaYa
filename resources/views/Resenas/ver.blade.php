@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Reseñas de tu Restaurante</h1>
    @forelse($resenas as $resena)
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Por: {{ $resena->cliente->nombre }}</h5>
                <p class="card-text">Calificación: {{ $resena->calificacion }}/5</p>
                <p class="card-text">{{ $resena->comentario }}</p>
            </div>
        </div>
    @empty
        <p>No hay reseñas para mostrar.</p>
    @endforelse
</div>
@endsection
