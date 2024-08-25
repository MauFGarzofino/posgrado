<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::all();
        return view('modulos.index', compact('modulos'));
    }

    public function create()
    {
        return view('modulos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'estado' => 'required|in:S,N',
        ]);

        Modulo::create($request->all());

        return redirect()->route('modulos.index')->with('success', 'Módulo creado con éxito');
    }

    public function edit(string $id)
    {
        $modulo = Modulo::findOrFail($id);
        return view('modulos.edit', compact('modulo'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'estado' => 'required|in:S,N',
        ]);

        $modulo = Modulo::findOrFail($id);
        $modulo->update($request->all());

        return redirect()->route('modulos.index')->with('success', 'Módulo actualizado con éxito');
    }

    public function destroy(string $id)
    {
        $modulo = Modulo::findOrFail($id);
        $modulo->delete();

        return redirect()->route('modulos.index')->with('success', 'Módulo eliminado con éxito');
    }
}
