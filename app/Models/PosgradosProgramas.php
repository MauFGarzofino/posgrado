<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosgradosProgramas extends Model
{
    use HasFactory;

    protected $table = 'posgrados_programas';
    protected $primaryKey = 'id_posgrado_programa';

    protected $fillable = [
        'id_nivel_academico',
        'id_carrera',
        'gestion',
        'nombre',
        'id_modalidad',
        'fecha_inicio',
        'fecha_fin',
        'fecha_inicio_inscrito',
        'fecha_fin_inscrito',
        'numero_max_cuotas',
        'documento',
        'costo_total',
        'formato_contrato',
        'formato_contrato_docente',
        'estado',
    ];

    // Relación con NivelesAcademicos
    public function nivelAcademico()
    {
        return $this->belongsTo(NivelesAcademicos::class, 'id_nivel_academico');
    }

    // Relación con Carreras
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera');
    }

    // Relación con Modalidades
    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'id_modalidad');
    }
}
