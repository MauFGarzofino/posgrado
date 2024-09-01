<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RolController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Rol::with('menusPrincipales')->select('roles.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_rol.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_rol.'" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('menus_principales', function($row){
                    return $row->menusPrincipales->pluck('nombre')->implode(', ');
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('roles.index');
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'max:200',
            'estado' => 'required|in:S,N',
        ]);

        Rol::updateOrCreate(
            ['id_rol' => $request->id_rol],
            $request->all()
        );

        return response()->json(['success' => 'Rol guardado exitosamente.']);
    }

    public function edit(string $id)
    {
        $rol = Rol::findOrFail($id);
        return response()->json($rol);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nombre' => 'required|max:150',
            'descripcion' => 'max:200',
            'estado' => 'required|in:S,N',
        ]);

        $rol = Rol::findOrFail($id);
        $rol->update($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol actualizado con éxito');
    }

    public function destroy(string $id)
    {
        $rol = Rol::findOrFail($id);
        $rol->delete();

        return response()->json(['success' => 'Rol eliminado con éxito.']);
    }
}
