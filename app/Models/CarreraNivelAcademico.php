<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarreraNivelAcademico extends Model
{
    use HasFactory;

    protected $table = 'carreras_niveles_academicos';
    protected $primaryKey = 'id_carrera_nivel_academico';

    protected $fillable = [
        'nombre',
        'descripcion',
        'estado'
    ];
}
