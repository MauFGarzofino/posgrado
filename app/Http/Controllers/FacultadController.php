<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Facultad;
use Illuminate\Http\Request;

class FacultadController extends Controller
{
    public function index()
    {
        $facultades = Facultad::all();
        return view('facultades.index', compact('facultades'));
    }

    public function create()
    {
        $areas = Area::all(); // Obtener todas las áreas
        return view('facultades.create', compact('areas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_area' => 'required|exists:areas,id_area',
            'nombre' => 'required|max:100',
            'nombre_abreviado' => 'max:50',
            'direccion' => 'max:100',
            'telefono' => 'max:100',
            'telefono_interno' => 'max:100',
            'fax' => 'max:20',
            'email' => 'max:30|email',
            'latitud' => 'max:25',
            'longitud' => 'max:25',
            'fecha_creacion' => 'date',
            'escudo' => 'max:60',
            'imagen' => 'max:60',
            'estado_virtual' => 'in:S,N',
            'estado' => 'required|in:S,N',
        ]);

        Facultad::create($request->all());

        return redirect()->route('facultades.index')->with('success', 'Facultad creada con éxito');
    }

    public function edit(string $id)
    {
        $facultad = Facultad::findOrFail($id);
        $areas = Area::all();
        return view('facultades.edit', compact('facultad', 'areas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_area' => 'required|exists:areas,id_area',
            'nombre' => 'required|max:100',
            'nombre_abreviado' => 'max:50',
            'direccion' => 'max:100',
            'telefono' => 'max:100',
            'telefono_interno' => 'max:100',
            'fax' => 'max:20',
            'email' => 'max:30|email',
            'latitud' => 'max:25',
            'longitud' => 'max:25',
            'fecha_creacion' => 'date',
            'escudo' => 'max:60',
            'imagen' => 'max:60',
            'estado_virtual' => 'in:S,N',
            'estado' => 'required|in:S,N',
        ]);

        $facultad = Facultad::findOrFail($id);
        $facultad->update($request->all());

        return redirect()->route('facultades.index')->with('success', 'Facultad actualizada con éxito');
    }

    public function destroy(string $id)
    {
        $facultad = Facultad::findOrFail($id);
        $facultad->delete();

        return redirect()->route('facultades.index')->with('success', 'Facultad eliminada con éxito');
    }
}
