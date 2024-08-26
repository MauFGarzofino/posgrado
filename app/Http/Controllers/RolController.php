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
                    $btn = '<a href="' . route('roles.edit', $row->id_rol) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('menus_principales', function($row){
                    // Retornar una lista de nombres de menús principales separados por coma
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

        Rol::create($request->all());

        return redirect()->route('roles.index')->with('success', 'Rol creado con éxito');
    }

    public function edit(string $id)
    {
        $rol = Rol::findOrFail($id);
        return view('roles.edit', compact('rol'));
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

        return redirect()->route('roles.index')->with('success', 'Rol eliminado con éxito');
    }
}
