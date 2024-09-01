<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\VPersonaMenuPrincipal;
use App\Models\Menu;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Hash the password to match the stored hash
        $hashedPassword = $request->password;

        // Find the user in the view based on email and password
        $user = VPersonaMenuPrincipal::where('email', $request->email)
            ->first();

        if ($user && Hash::check($hashedPassword, $user->password)) {
            // Generar el menú basado en el rol del usuario
            $menu = $this->generateMenu($user->id_rol);

            // Guardar información en la sesión
            $data_session = [
                'status' => true,
                'nombres' => $user->nombres,
                'apellidos' => $user->apellidos,
                'id_persona' => $user->id_persona,
                'nombre_rol' => $user->nombre_rol,
                'id_rol' => $user->id_rol,
                'fotografia' => $user->fotografia,
                'menu' => $menu
            ];

            Session::put('data_sesion', $data_session);

            return redirect()->intended('/dashboard');
        }

        return redirect()->back()->withErrors(['email' => 'Credenciales inválidas']);
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout()
    {
        Session::flush(); // Clear all session data
        return redirect()->route('login');
    }

    private function generateMenu($id_rol)
    {
        // Obtén los menús principales relacionados con el rol
        $menu_principal_ids = \DB::table('roles_menus_principales')
            ->where('id_rol', $id_rol)
            ->where('estado', 'S')
            ->pluck('id_menu_principal');

        // Genera el menú
        $menu_html = '';
        foreach ($menu_principal_ids as $id_menu_principal) {
            // Obtén el nombre del menú principal
            $menu_principal = \DB::table('menus_principales')
                ->where('id_menu_principal', $id_menu_principal)
                ->first();

            // Obtén los submenús asociados al menú principal
            $menus = \DB::table('menus')
                ->where('id_menu_principal', $id_menu_principal)
                ->orderBy('orden', 'ASC')
                ->get();

            $submenu_html = '';
            foreach ($menus as $menu) {
                $url = url($menu->directorio);
                $submenu_html .= '<li class="menu-item">
                <a href="' . $url . '" class="menu-link">
                    <div>' . $menu->nombre . '</div>
                </a>
            </li>';
            }

            $menu_html .= '<li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ' . $menu_principal->icono . '"></i>
                <div data-i18n="' . $menu_principal->nombre . '">' . $menu_principal->nombre . '</div>
            </a>
            <ul class="menu-sub">
                ' . $submenu_html . '
            </ul>
        </li>';
        }

        return $menu_html;
    }
}
