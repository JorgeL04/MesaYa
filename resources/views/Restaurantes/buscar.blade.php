@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Buscar Restaurantes</h1>
    <form action="{{ route('restaurantes.buscar') }}" method="GET">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del restaurante:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Buscar</button>
    </form>
    @if(isset($resultados))
        <div class="mt-5">
            <h3>Resultados:</h3>
            @forelse($resultados as $restaurante)
                <div>
                    <strong>{{ $restaurante->nombre }}</strong>
                    <p>{{ $restaurante->direccion }}</p>
                </div>
            @empty
                <p>No se encontraron restaurantes.</p>
            @endforelse
        </div>
    @endif
</div>
@endsection