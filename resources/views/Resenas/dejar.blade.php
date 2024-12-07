@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Dejar una Reseña</h1>
    <form action="{{ route('resenas.dejar') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="restaurante">Restaurante:</label>
            <select name="restaurante_id" id="restaurante" class="form-control">
                @foreach($restaurantes as $restaurante)
                    <option value="{{ $restaurante->id }}">{{ $restaurante->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-3">
            <label for="comentario">Comentario:</label>
            <textarea name="comentario" id="comentario" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group mt-3">
            <label for="calificacion">Calificación:</label>
            <input type="number" name="calificacion" id="calificacion" class="form-control" min="1" max="5">
        </div>
        <button type="submit" class="btn btn-success mt-3">Enviar Reseña</button>
    </form>
</div>
@endsection
