<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Universidad;
use Illuminate\Http\Request;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $configuraciones = Configuracion::all();
        return view('configuraciones.index', compact('configuraciones'));
    }

    public function create()
    {
        $universidades = Universidad::all();
        return view('configuraciones.create', compact('universidades'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'estado' => 'required|in:S,N',
            'id_universidad' => 'required|exists:universidades,id_universidad'
        ]);

        Configuracion::create($request->all());

        return redirect()->route('configuraciones.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $configuracion = Configuracion::findOrFail($id);
        $universidades = Universidad::all();
        return view('configuraciones.edit', compact('configuracion'), compact('universidades'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'tipo' => 'required|max:50',
            'descripcion' => 'required|max:255',
            'estado' => 'required|in:S,N',
            'id_universidad' => 'required|exists:universidades,id_universidad'
        ]);

        $configuracion = Configuracion::findOrFail($id);
        $configuracion->update($request->all());
    }

    public function destroy(string $id)
    {
        $configuracion = Configuracion::findOrFail($id);
        $configuracion->delete();
        return redirect()->route('configuraciones.index');
    }
}
