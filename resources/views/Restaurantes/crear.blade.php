@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Agregar Restaurante</h1>
    <form action="{{ route('restaurante.crear') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" required>
        </div>
        <div class="form-group mt-3">
            <label for="tipo_comida">Tipo de Comida:</label>
            <input type="text" name="tipo_comida" id="tipo_comida" class="form-control">
        </div>
        <button type="submit" class="btn btn-success mt-3">Agregar</button>
    </form>
</div>
@endsection
