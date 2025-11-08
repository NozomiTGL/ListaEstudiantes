@extends('layouts.app')

@section('title', 'Listado de Carreras')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Carreras Registradas</h2>
        <a href="{{ route('carreras.create') }}" class="btn btn-primary">Registrar Carrera</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($carreras as $carrera)
                <tr>
                    <td>{{ $carrera->nombre }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="{{ route('carreras.show', $carrera->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('carreras.edit', $carrera->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST" onsubmit="return confirm('¿Eliminar carrera?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection