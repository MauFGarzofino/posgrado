<?php

namespace App\Http\Controllers;

use App\Models\MenuPrincipal;
use App\Models\Rol;
use App\Models\RolMenuPrincipal;
use Illuminate\Http\Request;

class RolMenuPrincipalController extends Controller
{
    public function index()
    {
        $rolesMenusPrincipales = RolMenuPrincipal::all();
        return view('roles-menus-principales.index', compact('rolesMenusPrincipales'));
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
