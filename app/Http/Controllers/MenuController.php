<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuPrincipal;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Menu::with('menuPrincipal')->select('menus.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn = '<a href="' . route('menus.edit', $row->id_menu) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn .= '<button class="btn btn-danger btn-sm" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('menu_principal', function($row){
                    return $row->menuPrincipal->nombre;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('menus.index');
    }

    public function create()
    {
        $menusPrincipales = MenuPrincipal::all(); // Obtener todos los menús principales
        return view('menus.create', compact('menusPrincipales'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_menu_principal' => 'required|exists:menus_principales,id_menu_principal',
            'nombre' => 'required|max:250',
            'directorio' => 'required|max:350',
            'icono' => 'max:70',
            'imagen' => 'max:150',
            'color' => 'max:25',
            'orden' => 'integer',
            'estado' => 'required|in:S,N',
        ]);

        Menu::create($request->all());

        return redirect()->route('menus.index')->with('success', 'Menú creado con éxito');
    }

    public function edit(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menusPrincipales = MenuPrincipal::all();
        return view('menus.edit', compact('menu', 'menusPrincipales'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_menu_principal' => 'required|exists:menus_principales,id_menu_principal',
            'nombre' => 'required|max:250',
            'directorio' => 'required|max:350',
            'icono' => 'max:70',
            'imagen' => 'max:150',
            'color' => 'max:25',
            'orden' => 'integer',
            'estado' => 'required|in:S,N',
        ]);

        $menu = Menu::findOrFail($id);
        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', 'Menú actualizado con éxito');
    }

    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();

        return redirect()->route('menus.index')->with('success', 'Menú eliminado con éxito');
    }
}
