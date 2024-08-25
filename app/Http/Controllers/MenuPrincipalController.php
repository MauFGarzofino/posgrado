<?php

namespace App\Http\Controllers;

use App\Models\MenuPrincipal;
use App\Models\Modulo;
use Illuminate\Http\Request;

class MenuPrincipalController extends Controller
{
    public function index()
    {
        $menus_principales = MenuPrincipal::with('modulo')->get();
        return view('menus-principales.index', compact('menus_principales'));
    }

    public function create()
    {
        $modulos = Modulo::all(); // Obtener todos los módulos para el dropdown
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

        MenuPrincipal::create($request->all());

        return redirect()->route('menus-principales.index')->with('success', 'Menú Principal creado con éxito');
    }

    public function edit(string $id)
    {
        $menu_principal = MenuPrincipal::findOrFail($id);
        $modulos = Modulo::all();
        return view('menus-principales.edit', compact('menu_principal', 'modulos'));
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

        return redirect()->route('menus-principales.index')->with('success', 'Menú Principal eliminado con éxito');
    }
}
