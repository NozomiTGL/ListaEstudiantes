@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Estudiantes Registrados</h2>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-primary">Registrar Estudiante</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Carrera</th>
                <th>Semestre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->nombre }}</td>
                    <td>{{ $estudiante->correo }}</td>
                    <td>{{ $estudiante->carrera->nombre }}</td>
                    <td>{{ $estudiante->semestre }}</td>
                    <td>
                        <div class="d-flex justify-content-start gap-1">
                            <a href="{{ route('estudiantes.show', $estudiante->id) }}" class="btn btn-sm btn-info">Ver</a>
                            <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" onsubmit="return confirm('¿Eliminar estudiante?')">
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