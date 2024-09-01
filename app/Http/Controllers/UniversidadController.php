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
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_universidad.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_universidad.'" style="margin-left: 5px;">Delete</button>';
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

        // Crear o Actualizar el Registro
        Universidad::updateOrCreate(
            ['id_universidad' => $request->id_universidad],
            [
                'nombre' => $request->nombre,
                'nombre_abreviado' => $request->nombre_abreviado,
                'inicial' => $request->inicial,
                'estado' => $request->estado
            ]
        );

        // Retornar una Respuesta JSON
        return response()->json(['success' => 'Registro guardado exitosamente.']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id_universidad)
    {
        $table = Universidad::find($id_universidad);
        return response()->json($table);
    }


    public function update(Request $request, $id_universidad)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'nombre_abreviado' => 'max:100',
            'inicial' => 'max:50',
            'estado' => 'required|in:S,N',
        ]);

        $universidad = Universidad::find($id_universidad);
        $universidad->update($request->all());

        return redirect()->route('universidades.index');
    }

    public function destroy(string $id_universidad)
    {
        Universidad::find($id_universidad)->delete();
        return response()->json(['success' => 'Registro eliminado exitosamente.']);
    }
}
