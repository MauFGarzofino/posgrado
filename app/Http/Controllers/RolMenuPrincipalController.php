<?php

namespace App\Http\Controllers;

use App\Models\MenuPrincipal;
use App\Models\Rol;
use App\Models\RolMenuPrincipal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RolMenuPrincipalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = RolMenuPrincipal::with(['rol', 'menuPrincipal'])->select('roles_menus_principales.*');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('roles-menus-principales.edit', $row->id_rol_menu_principal) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('rol', function($row){
                    return $row->rol->nombre;
                })
                ->editColumn('menu_principal', function($row){
                    return $row->menuPrincipal->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('roles-menus-principales.index');
    }

    public function create()
    {
        $roles = Rol::all();
        $menusPrincipales = MenuPrincipal::all();
        return view('roles-menus-principales.create', compact('roles', 'menusPrincipales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_rol' => 'required|exists:roles,id_rol',
            'id_menu_principal' => 'required|exists:menus_principales,id_menu_principal',
            'estado' => 'required|in:S,N',
        ]);

        RolMenuPrincipal::create($request->all());

        return redirect()->route('roles-menus-principales.index')->with('success', 'Rol asociado a Menú Principal creado con éxito');
    }

    public function edit(string $id)
    {
        $rolMenuPrincipal = RolMenuPrincipal::findOrFail($id);
        $roles = Rol::all();
        $menusPrincipales = MenuPrincipal::all();
        return view('roles-menus-principales.edit', compact('rolMenuPrincipal', 'roles', 'menusPrincipales'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_rol' => 'required|exists:roles,id_rol',
            'id_menu_principal' => 'required|exists:menus_principales,id_menu_principal',
            'estado' => 'required|in:S,N',
        ]);

        $rolMenuPrincipal = RolMenuPrincipal::findOrFail($id);
        $rolMenuPrincipal->update($request->all());

        return redirect()->route('roles-menus-principales.index')->with('success', 'Rol asociado a Menú Principal actualizado con éxito');
    }

    public function destroy(string $id)
    {
        $rolMenuPrincipal = RolMenuPrincipal::findOrFail($id);
        $rolMenuPrincipal->delete();

        return redirect()->route('roles-menus-principales.index')->with('success', 'Rol asociado a Menú Principal eliminado con éxito');
    }
}
