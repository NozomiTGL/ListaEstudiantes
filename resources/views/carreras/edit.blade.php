@extends('layouts.app')

@section('title', 'Editar Carrera')

@section('content')
    <h2>Editar Carrera</h2>

    <form action="{{ route('carreras.update', $carrera->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Carrera</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $carrera->nombre) }}" required>

            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection