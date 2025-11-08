@extends('layouts.app')

@section('title', 'Registrar Carrera')

@section('content')
    <h2>Registrar Nueva Carrera</h2>

    <form action="{{ route('carreras.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre de la Carrera</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>

            @error('nombre')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection