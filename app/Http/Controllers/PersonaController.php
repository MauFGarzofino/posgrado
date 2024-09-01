<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PersonaController extends Controller
{
    public function index(Request $request)
    {
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
        return view('personas.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:150',
            'apellidos' => 'required|max:150',
            'ci' => 'required|max:20|unique:personas,ci',
            'imagen' => 'nullable|url|max:255',
        ]);

        Persona::updateOrCreate(
            ['id_persona' => $request->id_persona],
            $request->only(['nombres', 'apellidos', 'ci', 'imagen'])
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
        $request->validate([
            'nombres' => 'required|max:150',
            'apellidos' => 'required|max:150',
            'ci' => 'required|max:20|unique:personas,ci,'.$id_persona.',id_persona',
            'imagen' => 'nullable|url|max:255',
        ]);

        $persona = Persona::find($id_persona);
        $persona->update($request->only(['nombres', 'apellidos', 'ci', 'imagen']));

        return redirect()->route('personas.index');
    }

    public function destroy($id_persona)
    {
        Persona::find($id_persona)->delete();
        return response()->json(['success' => 'Persona eliminada exitosamente.']);
    }
}
