<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PosgradosProgramas;
use Illuminate\Http\Request;

class PosgradoProgramasController extends Controller
{
    public function index()
    {
        // Obtener todos los programas de posgrado
        $programas = PosgradosProgramas::all();

        // Pasar los programas a la vista
        return view('posgrado.index', compact('programas'));
    }
}
