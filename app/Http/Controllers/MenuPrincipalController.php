<?php

namespace App\Http\Controllers;

use App\Models\MenuPrincipal;
use App\Models\Modulo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MenuPrincipalController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MenuPrincipal::with('modulo')->select('menus_principales.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_menu_principal.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_menu_principal.'" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('modulo', function($row){
                    return $row->modulo->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $modulos = Modulo::all();
        return view('menus-principales.index', compact('modulos'));
    }

    public function create()
    {
        $modulos = Modulo::all();
        return view('menus-principales.create', compact('modulos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_modulo' => 'required|exists:modulos,id_modulo',
            'nombre' => 'required|max:250',
            'icono' => 'max:70',
            'orden' => 'nullable|integer',
            'estado' => 'required|in:S,N',
        ]);

        MenuPrincipal::updateOrCreate(
            ['id_menu_principal' => $request->id_menu_principal],
            $request->all()
        );

        return response()->json(['success' => 'Menú Principal guardado exitosamente.']);
    }

    public function edit(string $id)
    {
        $menuPrincipal = MenuPrincipal::findOrFail($id);
        return response()->json($menuPrincipal);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_modulo' => 'required|exists:modulos,id_modulo',
            'nombre' => 'required|max:250',
            'icono' => 'max:70',
            'orden' => 'nullable|integer',
            'estado' => 'required|in:S,N',
        ]);

        $menu_principal = MenuPrincipal::findOrFail($id);
        $menu_principal->update($request->all());

        return redirect()->route('menus-principales.index')->with('success', 'Menú Principal actualizado con éxito');
    }

    public function destroy(string $id)
    {
        $menu_principal = MenuPrincipal::findOrFail($id);
        $menu_principal->delete();

        return response()->json(['success' => 'Menú Principal eliminado con éxito.']);
    }
}
