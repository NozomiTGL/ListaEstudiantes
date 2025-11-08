<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\CarreraController;


Route::get('/', function(){return redirect()->route('estudiantes.index');});

Route::resource('estudiantes', EstudianteController::class);

Route::resource('carreras', CarreraController::class);
