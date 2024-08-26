<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Universidad;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AreaController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Area::with('universidad')->select('areas.*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('areas.edit', $row->id_area) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('universidad', function($row){
                    return $row->universidad->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('areas.index');
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
