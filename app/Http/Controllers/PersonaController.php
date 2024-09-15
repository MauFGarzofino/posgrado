<?php

namespace App\Http\Controllers;

use App\Models\EmisionCedula;
use App\Models\EstadoCivil;
use App\Models\GrupoSanguineo;
use App\Models\Localidad;
use App\Models\Persona;
use App\Models\Sexo;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PersonaController extends Controller
{
    public function index(Request $request)
    {
        $localidades = Localidad::all();
        $emisionCedulas = EmisionCedula::all();
        $sexos = Sexo::all();
        $gruposSanguineos = GrupoSanguineo::all();
        $estadosCiviles = EstadoCivil::all();
        if ($request->ajax()) {
            $data = Persona::query();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<button type="button" class="editRecord btn btn-primary btn-sm" data-id="'.$row->id_persona.'">Edit</button>';
                    $btn .= '<button class="btn btn-danger btn-sm deleteRecord" data-id="'.$row->id_persona.'" style="margin-left: 5px;">Delete</button>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('personas.index', compact('localidades', 'emisionCedulas', 'sexos', 'gruposSanguineos', 'estadosCiviles'));
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombres' => 'required|max:65',
            'paterno' => 'required|max:20',
            'materno' => 'nullable|max:20',
            'numero_identificacion_personal' => 'required|max:15|unique:personas,numero_identificacion_personal,' . ($request->id_persona ?? 'NULL') . ',id_persona', // Si id_persona es nulo, se está creando un registro nuevo.
            'id_localidad' => 'required|exists:localidades,id_localidad',
            'id_emision_cedula' => 'required|exists:emision_cedulas,id_emision_cedula',
            'id_sexo' => 'required|exists:sexos,id_sexo',
            'id_grupo_sanguineo' => 'required|exists:grupos_sanguineos,id_grupo_sanguineo',
            'fecha_nacimiento' => 'nullable|date',
            'telefono_celular' => 'nullable|max:12',
            'telefono_fijo' => 'nullable|max:12',
            'direccion' => 'nullable|max:60',
            'latitud' => 'nullable|max:30',
            'longitud' => 'nullable|max:30',
            'zona' => 'nullable|max:50',
            'id_estado_civil' => 'required|exists:estados_civiles,id_estado_civil',
            'email' => 'nullable|email|max:50',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de la imagen
        ]);

        // Manejo de la imagen
        $imagePath = 'default.jpg'; // Imagen predeterminada
        if ($request->hasFile('imagen')) {
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('fotografias'), $imageName);
            $imagePath = $imageName;
        }

        // Actualizar o crear la persona
        Persona::updateOrCreate(
            ['id_persona' => $request->id_persona],
            [
                'nombres' => $request->nombres,
                'paterno' => $request->paterno,
                'materno' => $request->materno,
                'numero_identificacion_personal' => $request->numero_identificacion_personal,
                'id_localidad' => $request->id_localidad,
                'id_emision_cedula' => $request->id_emision_cedula,
                'id_sexo' => $request->id_sexo,
                'id_grupo_sanguineo' => $request->id_grupo_sanguineo,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'direccion' => $request->direccion,
                'latitud' => $request->latitud,
                'longitud' => $request->longitud,
                'telefono_celular' => $request->telefono_celular,
                'telefono_fijo' => $request->telefono_fijo,
                'zona' => $request->zona,
                'id_estado_civil' => $request->id_estado_civil,
                'email' => $request->email,
                'fotografia' => $imagePath,
            ]
        );

        return response()->json(['success' => 'Persona guardada exitosamente.']);
    }

    public function edit($id_persona)
    {
        $persona = Persona::find($id_persona);
        return response()->json($persona);
    }

    public function update(Request $request, $id_persona)
    {
        // Validación
        $request->validate([
            'nombres' => 'required|max:150',
            'paterno' => 'required|max:150',
            'materno' => 'nullable|max:150',
            'numero_identificacion_personal' => 'required|max:15|unique:personas,numero_identificacion_personal,' . $id_persona . ',id_persona',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Encontrar la persona
        $persona = Persona::find($id_persona);

        // Manejo de la imagen: Si hay una nueva imagen, se guarda y se elimina la anterior.
        if ($request->hasFile('imagen')) {
            if ($persona->fotografia != 'default.jpg') {
                \File::delete(public_path('fotografias/' . $persona->fotografia));
            }

            // Guardar la nueva imagen
            $imageName = time() . '.' . $request->imagen->extension();
            $request->imagen->move(public_path('fotografias'), $imageName);
            $persona->fotografia = $imageName;
        }

        // Actualizar el resto de los datos
        $persona->update($request->only(['nombres', 'paterno', 'materno', 'numero_identificacion_personal']));

        return response()->json(['success' => 'Persona actualizada exitosamente.']);
    }
    public function destroy($id_persona)
    {
        $persona = Persona::find($id_persona);

        // Eliminar la imagen si no es la predeterminada
        if ($persona->fotografia != 'default.jpg') {
            \File::delete(public_path('fotografias/' . $persona->fotografia));
        }

        // Eliminar la persona
        $persona->delete();

        return response()->json(['success' => 'Persona eliminada exitosamente.']);
    }
}
