<?php

namespace App\Http\Controllers;

use App\Models\GestionPeriodo;
use Illuminate\Http\Request;

class GestionPeriodoController extends Controller
{
    public function index()
    {
        $gestionesPeriodos = GestionPeriodo::all();
        return view('gestiones_periodos.index', compact('gestionesPeriodos'));
    }

    public function create()
    {
        return view('gestiones_periodos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        GestionPeriodo::create($request->all());

        return redirect()->route('gestiones_periodos.index')
            ->with('success', 'Periodo de gestión creado con éxito.');
    }
}
