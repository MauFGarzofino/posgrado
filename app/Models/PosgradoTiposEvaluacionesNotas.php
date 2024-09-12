<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosgradoTiposEvaluacionesNotas extends Model
{
    use HasFactory;

    protected $table = 'posgrado_tipos_evaluaciones_notas';
    protected $primaryKey = 'id_posgrado_tipo_evaluacion_nota';

    protected $fillable = [
        'nombre',
        'configuracion',
        'nota_minima_aprobacion',
        'estado',
    ];
}
