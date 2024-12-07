@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Gestionar Reservas</h1>
    <table class="table table-striped mt-4">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($reservas as $reserva)
                <tr>
                    <td>{{ $reserva->cliente->nombre }}</td>
                    <td>{{ $reserva->fecha }}</td>
                    <td>{{ $reserva->hora }}</td>
                    <td>
                        <a href="#" class="btn btn-warning">Editar</a>
                        <form action="#" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancelar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">No hay reservas para gestionar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
