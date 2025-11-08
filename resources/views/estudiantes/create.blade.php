@extends('layouts.app')

@section('title', 'Registrar Estudiante')

@section('content')
    <h2>Registrar Nuevo Estudiante</h2>

    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo') }}" required>
        </div>

        <div class="mb-3">
            <label for="carrera_id" class="form-label">Carrera</label>
            <select name="carrera_id" id="carrera_id" class="form-select" required>
                <option value="">Seleccione una carrera</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" name="semestre" id="semestre" class="form-control" value="{{ old('semestre') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection