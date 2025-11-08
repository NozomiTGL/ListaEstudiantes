@extends('layouts.app')

@section('title', 'Detalle de la Carrera')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h2>Detalle de la Carrera</h2>
        <a href="{{ route('carreras.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $carrera->nombre }}</h5>
            <p class="card-text"><strong>ID:</strong> {{ $carrera->id }}</p>
        </div>
    </div>

    <div class="mt-3 d-flex gap-2">
        <a href="{{ route('carreras.edit', $carrera->id) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST" onsubmit="return confirm('¿Eliminar carrera?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger">Eliminar</button>
        </form>
    </div>
@endsection