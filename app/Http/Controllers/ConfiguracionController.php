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
        if ($request->ajax()) {
            $data = Configuracion::with('universidad')->select('configuraciones.*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('configuraciones.edit', $row->id_configuracion) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('universidad', function($row){
                    return $row->universidad->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('configuraciones.index');
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
