<?php

namespace App\Http\Controllers;

use App\Models\PosgradoAsignacionesDocentes;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    /**
     * Desasigna un docente de una materia.
     *
     * @param int $materiaId El ID de la materia
     * @param int $docenteId El ID del docente
     * @return \Illuminate\Http\JsonResponse
     */
    public function desasignarDocente($materiaId, $docenteId)
    {
        // Buscar la asignación en la tabla de asignaciones
        $asignacion = PosgradoAsignacionesDocentes::where('id_posgrado_materia', $materiaId)
            ->where('id_persona_docente', $docenteId)
            ->first();

        // Verificar si la asignación existe
        if ($asignacion) {
            // Eliminar la asignación
            $asignacion->delete();
            return response()->json(['message' => 'Docente desasignado correctamente'], 200);
        } else {
            // Retornar un mensaje de error si la asignación no existe
            return response()->json(['message' => 'Asignación no encontrada'], 404);
        }
    }
}
