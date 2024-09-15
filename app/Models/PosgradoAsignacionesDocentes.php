<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosgradoAsignacionesDocentes extends Model
{
    use HasFactory;

    protected $table = 'posgrado_asignaciones_docentes';
    protected $primaryKey = 'id_posgrado_asignacion_docente';

    protected $fillable = [
        'id_persona_docente',
        'id_posgrado_materia',
        'id_posgrado_tipo_evaluacion_nota',
        'id_gestion_periodo',
        'tipo_calificacion',
        'grupo',
        'cupo_maximo_estudiante',
        'finaliza_planilla_calificacion',
        'fecha_limite_examen_final',
        'fecha_limite_nota_2da_instancia',
        'fecha_limite_nota_examen_mesa',
        'fecha_finalizacion_planilla',
        'hash',
        'codigo_barras',
        'codigo_qr',
        'estado',
    ];

    // Relación con PersonaDocente
    public function docente()
    {
        return $this->belongsTo(PersonaDocente::class, 'id_persona_docente');
    }

    // Relación con PosgradoMateria
    public function materia()
    {
        return $this->belongsTo(PosgradoMaterias::class, 'id_posgrado_materia');
    }

    // Relación con PosgradoTipoEvaluacionNota
    public function tipoEvaluacion()
    {
        return $this->belongsTo(PosgradoTiposEvaluacionesNotas::class, 'id_posgrado_tipo_evaluacion_nota');
    }

    // Relación con GestionPeriodo
    public function gestionPeriodo()
    {
        return $this->belongsTo(GestionesPeriodos::class, 'id_gestion_periodo');
    }
}
