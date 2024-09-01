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
        $roles = Rol::all();
        $menusPrincipales = MenuPrincipal::all();

        if ($request->ajax()) {
            $data = RolMenuPrincipal::with(['rol', 'menuPrincipal'])->select('roles_menus_principales.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_rol_menu_principal.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_rol_menu_principal.'" style="margin-left: 5px;">Delete</button>';
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

        // Pasamos las variables $roles y $menusPrincipales a la vista
        return view('roles-menus-principales.index', compact('roles', 'menusPrincipales'));
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

        RolMenuPrincipal::updateOrCreate(
            ['id_rol_menu_principal' => $request->id_rol_menu_principal],
            $request->all()
        );

        return response()->json(['success' => 'Rol asociado a Menú Principal guardado exitosamente.']);
    }

    public function edit(string $id)
    {
        $rolMenuPrincipal = RolMenuPrincipal::findOrFail($id);
        $roles = Rol::all();
        $menusPrincipales = MenuPrincipal::all();
        return response()->json(compact('rolMenuPrincipal', 'roles', 'menusPrincipales'));
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

        return response()->json(['success' => 'Rol asociado a Menú Principal eliminado con éxito.']);
    }
}
