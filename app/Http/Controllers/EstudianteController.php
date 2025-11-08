<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->get();
        return view('estudiantes.index', compact('estudiantes'));

    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('estudiantes.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|unique:estudiantes',
        'carrera_id' => 'required|exists:carreras,id',
        'semestre' => 'required|integer|min:1|max:12',
    ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante registrado correctamente.');
    }

    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $carreras = Carrera::all();
        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }


    public function show($id)
    {
        $estudiante = Estudiante::with('carrera')->findOrFail($id);
        return view('estudiantes.show', compact('estudiante'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'nombre' => 'required|string|max:255',
        'correo' => 'required|email|unique:estudiantes,correo,',
        'carrera_id' => 'required|exists:carreras,id',
        'semestre' => 'required|integer|min:1|max:12',
    ]);

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->update($request->all());

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado  correctamente.');
    }

    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente.');
    }
}
