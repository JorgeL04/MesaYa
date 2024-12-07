@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Editar Perfil</h1>
    <form action="{{ route('perfil.editar') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $user->nombre }}">
        </div>
        <div class="form-group mt-3">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
    </form>
</div>
@endsection
