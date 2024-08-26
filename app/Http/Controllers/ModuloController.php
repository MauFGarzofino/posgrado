<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ModuloController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Modulo::query();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('modulos.edit', $row->id_modulo) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('modulos.index');
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
