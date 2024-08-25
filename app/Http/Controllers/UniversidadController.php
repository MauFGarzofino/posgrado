<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UniversidadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Universidad::query();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('universidades.edit', $row->id_universidad) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('universidades.index');
    }

    public function create()
    {
        return view('universidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'nombre_abreviado' => 'max:100',
            'inicial' => 'max:50',
            'estado' => 'required|in:S,N',
        ]);

        Universidad::create($request->all());

        return redirect()->route('universidades.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id_universidad)
    {
        $universidad = Universidad::findOrFail($id_universidad);
        return view('universidades.edit', compact('universidad'));
    }

    public function update(Request $request, $id_universidad)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'nombre_abreviado' => 'max:100',
            'inicial' => 'max:50',
            'estado' => 'required|in:S,N',
        ]);

        $universidad = Universidad::findOrFail($id_universidad);
        $universidad->update($request->all());

        return redirect()->route('universidades.index');
    }

    public function destroy(string $id_universidad)
    {
        $universidad = Universidad::findOrFail($id_universidad);
        $universidad->delete();

        return redirect()->route('universidades.index');
    }
}
