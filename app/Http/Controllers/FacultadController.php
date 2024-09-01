<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Facultad;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class FacultadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Facultad::with('area')->select('facultades.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_facultad.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_facultad.'" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('area', function($row){
                    return $row->area->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $areas = Area::all();
        return view('facultades.index', compact('areas'));
    }

    public function create()
    {
        $areas = Area::all();
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

        Facultad::updateOrCreate(
            ['id_facultad' => $request->id_facultad],
            $request->all()
        );

        return response()->json(['success' => 'Facultad guardada exitosamente.']);
    }

    public function edit(string $id)
    {
        $facultad = Facultad::findOrFail($id);
        $areas = Area::all();
        return response()->json(compact('facultad', 'areas'));
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

        return response()->json(['success' => 'Facultad eliminada con éxito.']);
    }
}
