<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Universidad;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::all();
        return view('areas.index', compact('areas'));
    }

    public function create()
    {
        $universidades = Universidad::all();
        return view('areas.create', compact('universidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'estado' => 'required|in:S,N',
            'id_universidad' => 'required|exists:universidades,id_universidad'
        ]);

        Area::create($request->all());

        return redirect()->route('areas.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $universidades = Universidad::all(); // Obtener todas las universidades
        $area = Area::findOrFail($id); // Encontrar el área o lanzar un error 404
        return view('areas.edit', compact('area', 'universidades')); // Pasar ambas variables a la vista
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'nombre_abreviado' => 'max:100',
            'estado' => 'required|in:S,N',
            'id_universidad' => 'required|exists:universidades,id_universidad',
        ]);

        $area = Area::findOrFail($id);
        $area->update($request->all());

        return redirect()->route('areas.index')->with('success', 'Área actualizada con éxito');
    }

    public function destroy(string $id)
    {
        $area = Area::findOrFail($id);
        $area->delete();

        return redirect()->route('areas.index')->with('success', 'Área eliminada con éxito');
    }
}
