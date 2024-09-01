<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Universidad;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ConfiguracionController extends Controller
{
    public function index(Request $request)
    {
        $universidades = Universidad::all();

        if ($request->ajax()) {
            $data = Configuracion::with('universidad')->select('configuraciones.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="javascript:void(0)" class="editRecord btn btn-primary btn-sm" data-id="' . $row->id_configuracion . '">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="' . $row->id_configuracion . '" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('universidad', function ($row) {
                    return $row->universidad->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('configuraciones.index', compact('universidades'));
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

        return response()->json(['success' => 'Configuración guardada exitosamente.']);
    }

    public function show(string $id)
    {
        //
    }

    public function edit($id)
    {
        $configuracion = Configuracion::findOrFail($id);
        return response()->json($configuracion);
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

    public function destroy($id)
    {
        Configuracion::findOrFail($id)->delete();
        return response()->json(['success' => 'Configuración eliminada exitosamente.']);
    }
}
