<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    use HasFactory;

    protected $table = 'carreras';
    protected $primaryKey = 'id_carrera';

    protected $fillable = [
        'id_facultad',
        'id_modalidad',
        'id_carrera_nivel_academico',
        'id_sede',
        'nombre',
        'nombre_abreviado',
        'fecha_aprobacion_curriculo',
        'fecha_creacion',
        'resolucion',
        'direccion',
        'latitud',
        'longitud',
        'fax',
        'telefono',
        'telefono_interno',
        'casilla',
        'email',
        'sitio_web',
        'estado'
    ];

    // Relación con Facultad
    public function facultad()
    {
        return $this->belongsTo(Facultad::class, 'id_facultad');
    }

    // Relación con Modalidad
    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'id_modalidad');
    }

    // Relación con CarrerasNivelesAcademicos
    public function nivelAcademico()
    {
        return $this->belongsTo(CarreraNivelAcademico::class, 'id_carrera_nivel_academico');
    }

    // Relación con Sedes
    public function sede()
    {
        return $this->belongsTo(Sede::class, 'id_sede');
    }
}
