<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Models\Persona;
use App\Models\Rol;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UsuarioController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Usuario::with('persona', 'rol')->select('usuarios.*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_usuario.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_usuario.'" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->editColumn('persona', function($row) {
                    return $row->persona->nombres . ' ' . $row->persona->apellidos;
                })
                ->editColumn('rol', function($row) {
                    return $row->rol->nombre;
                })
                ->editColumn('username', function($row) {
                    return $row->username;
                })
                ->editColumn('email', function($row) {
                    return $row->email;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $personas = Persona::all();
        $roles = Rol::all();
        return view('usuarios.index', compact('personas', 'roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'id_rol' => 'required|exists:roles,id_rol',
            'username' => 'required|max:100|unique:usuarios,username',
            'email' => 'required|max:150|unique:usuarios,email', // El campo ahora es 'email'
            'password' => 'required|min:6',
            'estado' => 'required|in:S,N',
        ]);

        Usuario::updateOrCreate(
            ['id_usuario' => $request->id_usuario],
            [
                'id_persona' => $request->id_persona,
                'id_rol' => $request->id_rol,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'estado' => $request->estado
            ]
        );

        return response()->json(['success' => 'Usuario guardado exitosamente.']);
    }
    public function edit($id_usuario)
    {
        $usuario = Usuario::find($id_usuario);
        return response()->json($usuario);
    }

    public function update(Request $request, $id_usuario)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'id_rol' => 'required|exists:roles,id_rol',
            'username' => 'required|max:100|unique:usuarios,username,'.$id_usuario.',id_usuario',
            'email' => 'required|max:150|unique:usuarios,email,'.$id_usuario.',id_usuario',
            'password' => 'nullable|min:6',
            'estado' => 'required|in:S,N',
        ]);

        $usuario = Usuario::find($id_usuario);
        $data = $request->only(['id_persona', 'id_rol', 'username', 'email', 'estado']);
        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        }
        $usuario->update($data);

        return redirect()->route('usuarios.index');
    }

    public function destroy($id_usuario)
    {
        Usuario::find($id_usuario)->delete();
        return response()->json(['success' => 'Usuario eliminado exitosamente.']);
    }
}
