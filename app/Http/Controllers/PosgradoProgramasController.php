<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Carrera;
use App\Models\GestionPeriodo;
use App\Models\Modalidad;
use App\Models\NivelesAcademicos;
use App\Models\PersonaDocente;
use App\Models\PosgradosProgramas;
use App\Models\PosgradoTiposEvaluacionesNotas;
use Illuminate\Http\Request;

    class PosgradoProgramasController extends Controller
    {
        public function index()
        {
            // Obtener todos los programas de posgrado
            $programas = PosgradosProgramas::all();

            // Obtener todos los niveles académicos
            $nivelesAcademicos = NivelesAcademicos::all();

            // Obtener todas las carreras
            $carreras = Carrera::all();

            // Obtener todas las modalidades
            $modalidades = Modalidad::all();

            // Obtener los docentes
            $docentes = PersonaDocente::with('persona')->get();

            // Obtener los periodos de gestión
            $gestionesPeriodos = GestionPeriodo::all();

            // Obtener los tipos de evaluación
            $tiposEvaluacion = PosgradoTiposEvaluacionesNotas::all();

            // Pasar los datos a la vista
            return view('posgrado.index', compact('programas', 'nivelesAcademicos', 'carreras', 'modalidades', 'docentes', 'gestionesPeriodos', 'tiposEvaluacion'));
        }

        public function store(Request $request)
        {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'id_nivel_academico' => 'required|exists:niveles_academicos,id_nivel_academico', // Nombre correcto de la columna
                'id_carrera' => 'required|exists:carreras,id_carrera', // Nombre correcto de la columna
                'id_modalidad' => 'required|exists:modalidades,id_modalidad', // Nombre correcto de la columna
                'gestion' => 'required|integer',
                'fecha_inicio' => 'required|date',
                'fecha_fin' => 'required|date',
                'fecha_inicio_inscrito' => 'required|date',
                'fecha_fin_inscrito' => 'required|date',
                'numero_max_cuotas' => 'required|integer',
                'costo_total' => 'required|numeric',
                'formato_contrato' => 'nullable|string',
                'formato_contrato_docente' => 'nullable|string',
                'estado' => 'required|string|in:A,I',
            ]);

            // Crear el programa
            PosgradosProgramas::create([
                'nombre' => $request->nombre,
                'id_nivel_academico' => $request->id_nivel_academico,
                'id_carrera' => $request->id_carrera,
                'id_modalidad' => $request->id_modalidad,
                'gestion' => $request->gestion,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
                'fecha_inicio_inscrito' => $request->fecha_inicio_inscrito,
                'fecha_fin_inscrito' => $request->fecha_fin_inscrito,
                'numero_max_cuotas' => $request->numero_max_cuotas,
                'documento' => $request->hasFile('documento') ? $request->file('documento')->store('documentos') : null,
                'costo_total' => $request->costo_total,
                'formato_contrato' => $request->formato_contrato,
                'formato_contrato_docente' => $request->formato_contrato_docente,
                'estado' => $request->estado,
            ]);

            return response()->json(['success' => true]);
        }

}
