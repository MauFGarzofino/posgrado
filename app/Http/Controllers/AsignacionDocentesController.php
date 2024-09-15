<?php

namespace App\Http\Controllers;

use App\Models\GestionPeriodo;
use App\Models\PersonaDocente;
use App\Models\PosgradoAsignacionesDocentes;
use App\Models\PosgradoMaterias;
use App\Models\PosgradosProgramas;
use App\Models\PosgradoTiposEvaluacionesNotas;
use Illuminate\Http\Request;

class AsignacionDocentesController extends Controller
{
    public function index()
    {
        // Obtener todos los programas
        $programas = PosgradosProgramas::all();

        // Obtener los docentes con los datos de la persona asociada
        $docentes = PersonaDocente::with('persona')->get();

        // Obtener los periodos de gestión
        $gestionesPeriodos = GestionPeriodo::all();

        // Obtener los tipos de evaluación
        $tiposEvaluacion = PosgradoTiposEvaluacionesNotas::all();

        // Retornar la vista con los programas, docentes, gestiones y tipos de evaluación
        return view('posgrado.index', compact('programas', 'docentes', 'gestionesPeriodos', 'tiposEvaluacion'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'materia_id' => 'required|exists:posgrado_materias,id_posgrado_materia',
            'docente_id' => 'required|exists:personas_docentes,id_persona_docente',
            'id_gestion_periodo' => 'required|exists:gestiones_periodos,id_gestion_periodo',
            'id_posgrado_tipo_evaluacion_nota' => 'required|exists:posgrado_tipos_evaluaciones_notas,id_posgrado_tipo_evaluacion_nota',
            'grupo' => 'required|string|max:3',
            'cupo_maximo_estudiante' => 'required|integer|min:1',
        ]);

        // Verificar si el docente ya está asignado a la materia en este periodo de gestión
        $existingAssignment = PosgradoAsignacionesDocentes::where('id_posgrado_materia', $request->materia_id)
            ->where('id_persona_docente', $request->docente_id)
            ->where('id_gestion_periodo', $request->id_gestion_periodo)
            ->first();

        if ($existingAssignment) {
            return response()->json([
                'success' => false,
                'message' => 'El docente ya está asignado a esta materia en el periodo seleccionado.'
            ], 400);
        }

        // Crear la nueva asignación si no existe una previa
        PosgradoAsignacionesDocentes::create([
            'id_posgrado_materia' => $request->materia_id,
            'id_persona_docente' => $request->docente_id,
            'id_gestion_periodo' => $request->id_gestion_periodo,
            'id_posgrado_tipo_evaluacion_nota' => $request->id_posgrado_tipo_evaluacion_nota,
            'tipo_calificacion' => 'N',
            'grupo' => $request->grupo,
            'cupo_maximo_estudiante' => $request->cupo_maximo_estudiante,
            'estado' => 'S',
            'fecha_limite_examen_final' => now()->addMonth(),
            'fecha_limite_nota_2da_instancia' => now()->addMonth(2),
            'fecha_limite_nota_examen_mesa' => now()->addMonth(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['success' => true]);
    }
}
