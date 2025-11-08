@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
    <h2>Editar Estudiante</h2>

    <form action="{{ route('estudiantes.update', $estudiante->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $estudiante->nombre) }}" required>
        </div>

        <div class="mb-3">
            <label for="correo" class="form-label">Correo</label>
            <input type="email" name="correo" id="correo" class="form-control" value="{{ old('correo', $estudiante->correo) }}" required>
        </div>

        <div class="mb-3">
            <label for="carrera_id" class="form-label">Carrera</label>
            <select name="carrera_id" id="carrera_id" class="form-select" required>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $estudiante->carrera_id == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="semestre" class="form-label">Semestre</label>
            <input type="number" name="semestre" id="semestre" class="form-control" value="{{ old('semestre', $estudiante->semestre) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection