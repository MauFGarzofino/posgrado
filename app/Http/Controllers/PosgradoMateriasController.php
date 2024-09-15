<?php

namespace App\Http\Controllers;

use App\Models\PosgradoMaterias;
use Illuminate\Http\Request;

class PosgradoMateriasController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos recibidos, incluyendo la imagen
        $request->validate([
            'id_posgrado_programa' => 'required|exists:posgrados_programas,id_posgrado_programa',
            'id_posgrado_nivel' => 'required|exists:posgrado_niveles,id_posgrado_nivel',
            'nombre' => 'required|max:255',
            'sigla' => 'required|max:10',
            'estado' => 'required|in:S,N',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validación de la imagen
        ]);

        // Manejo de la imagen
        $imagePath = null;
        if ($request->hasFile('imagen')) {
            $imageName = time() . '_' . $request->imagen->getClientOriginalName();
            $request->imagen->move(public_path('materias_imagenes'), $imageName); // Guardar la imagen en la carpeta materias_imagenes
            $imagePath = $imageName;
        }

        // Crear la materia y guardar el nombre del archivo de imagen
        $materia = PosgradoMaterias::create([
            'id_posgrado_programa' => $request->id_posgrado_programa,
            'id_posgrado_nivel' => $request->id_posgrado_nivel,
            'nombre' => $request->nombre,
            'sigla' => $request->sigla,
            'estado' => $request->estado,
            'imagen' => $imagePath, // Guardar solo el nombre de la imagen
        ]);

        return response()->json(['success' => 'Materia creada exitosamente.', 'materia' => $materia]);
    }

    public function update(Request $request, $id_materia)
    {
        // Validar los datos recibidos, incluyendo la imagen
        $request->validate([
            'id_posgrado_programa' => 'required|exists:posgrados_programas,id_posgrado_programa',
            'id_posgrado_nivel' => 'required|exists:posgrado_niveles,id_posgrado_nivel',
            'nombre' => 'required|max:255',
            'sigla' => 'required|max:10',
            'estado' => 'required|in:S,N',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validación de la imagen
        ]);

        // Encontrar la materia
        $materia = PosgradoMaterias::find($id_materia);

        // Manejo de la imagen: Si hay una nueva imagen, se guarda y se elimina la anterior
        if ($request->hasFile('imagen')) {
            if ($materia->imagen !== 'default.png') {
                \File::delete(public_path('materias_imagenes/' . $materia->imagen)); // Eliminar la imagen anterior si no es nula
            }

            // Guardar la nueva imagen
            $imageName = time() . '_' . $request->imagen->getClientOriginalName();
            $request->imagen->move(public_path('materias_imagenes'), $imageName); // Guardar la nueva imagen en la carpeta materias_imagenes
            $materia->imagen = $imageName;
        }

        // Actualizar el resto de los datos
        $materia->update($request->only(['id_posgrado_programa', 'id_posgrado_nivel', 'nombre', 'sigla', 'estado']));

        return response()->json(['success' => 'Materia actualizada exitosamente.']);
    }

    public function destroy($id_materia)
    {
        $materia = PosgradoMaterias::find($id_materia);

        // Eliminar la imagen si no es nula
        if ($materia->imagen) {
            \File::delete(public_path('materias_imagenes/' . $materia->imagen)); // Eliminar la imagen de la carpeta materias_imagenes
        }

        // Eliminar la materia
        $materia->delete();

        return response()->json(['success' => 'Materia eliminada exitosamente.']);
    }
}
