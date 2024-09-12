<?php

namespace App\Http\Controllers;

use App\Models\GestionPeriodo;
use App\Models\PersonaDocente;
use App\Models\PosgradoAsignacionesDocentes;
use App\Models\PosgradoMaterias;
use App\Models\PosgradosProgramas;
use Illuminate\Http\Request;

class AsignacionDocentesController extends Controller
{
    /**
     * Muestra la página de asignación de docentes a materias.
     */
    public function index()
    {
        // Obtener todos los programas
        $programas = PosgradosProgramas::all();

        // Obtener los docentes con los datos de la persona asociada
        $docentes = PersonaDocente::with('persona')->get();

        // Obtener los periodos de gestión
        $gestionesPeriodos = GestionPeriodo::all();

        // Retornar la vista con los programas, docentes y gestiones
        return view('posgrado.index', compact('programas', 'docentes', 'gestionesPeriodos'));
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

        // Crear la asignación en la tabla posgrado_asignaciones_docentes
        PosgradoAsignacionesDocentes::create([
            'id_posgrado_materia' => $request->materia_id,
            'id_persona_docente' => $request->docente_id,
            'id_gestion_periodo' => $request->id_gestion_periodo,
            'id_posgrado_tipo_evaluacion_nota' => $request->id_posgrado_tipo_evaluacion_nota,
            'tipo_calificacion' => 'N', // Esto puede ser dinámico si es necesario
            'grupo' => $request->grupo,
            'cupo_maximo_estudiante' => $request->cupo_maximo_estudiante,
            'estado' => 'S',
            'fecha_limite_examen_final' => now()->addMonth(),
            'fecha_limite_nota_2da_instancia' => now()->addMonth(2),
            'fecha_limite_nota_examen_mesa' => now()->addMonth(3),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Docente asignado con éxito.');
    }
}
