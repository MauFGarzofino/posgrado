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
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_area.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_area.'" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('universidad', function($row){
                    return $row->universidad->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // Obtener todas las universidades para el dropdown
        $universidades = Universidad::all();

        return view('areas.index', compact('universidades'));
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'nombre_abreviado' => 'max:100',
            'estado' => 'required|in:S,N',
            'id_universidad' => 'required|exists:universidades,id_universidad'
        ]);

        Area::updateOrCreate(
            ['id_area' => $request->id_area],
            [
                'nombre' => $request->nombre,
                'nombre_abreviado' => $request->nombre_abreviado,
                'estado' => $request->estado,
                'id_universidad' => $request->id_universidad,
            ]
        );

        return response()->json(['success' => 'Área guardada exitosamente.']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id_area)
    {
        $area = Area::find($id_area);
        return response()->json($area);
    }

    public function update(Request $request, $id_area)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'nombre_abreviado' => 'max:100',
            'estado' => 'required|in:S,N',
            'id_universidad' => 'required|exists:universidades,id_universidad',
        ]);

        $area = Area::find($id_area);
        $area->update($request->all());

        return redirect()->route('areas.index');
    }

    public function destroy(string $id_area)
    {
        Area::find($id_area)->delete();
        return response()->json(['success' => 'Área eliminada exitosamente.']);
    }
}
