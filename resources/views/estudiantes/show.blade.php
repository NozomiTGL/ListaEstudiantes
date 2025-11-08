@extends('layouts.app')

@section('title', 'Detalle del Estudiante')

@section('content')
    <h2>Detalle del Estudiante</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $estudiante->nombre }}</h5>
            <p class="card-text"><strong>Correo:</strong> {{ $estudiante->correo }}</p>
            <p class="card-text"><strong>Carrera:</strong> {{ $estudiante->carrera->nombre }}</p>
            <p class="card-text"><strong>Semestre:</strong> {{ $estudiante->semestre }}</p>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('estudiantes.edit', $estudiante->id) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary">Volver</a>
    </div>
@endsection