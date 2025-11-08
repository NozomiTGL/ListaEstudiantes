<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'correo',
        'carrera_id',
        'semestre',
    ];

    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}
