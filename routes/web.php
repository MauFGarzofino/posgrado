<?php

use App\Http\Controllers\AsignacionDocentesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\GestionPeriodoController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\PosgradoProgramasController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RolMenuPrincipalController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\UsuarioController;
use App\Models\PosgradoMaterias;
use App\Models\PosgradosProgramas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

// Authentication routes
Route::get('/usuario/login', [AuthController::class, 'login'])->name('login');
Route::post('/usuario/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::post('/usuario/logout', [AuthController::class, 'logout'])->name('logout');

// Grouped Protected Routes
Route::middleware(['verify'])->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

    // Resource routes
    Route::resource('universidades', UniversidadController::class);
    Route::resource('configuraciones', ConfiguracionController::class);
    Route::resource('areas', AreaController::class);
    Route::resource('facultades', FacultadController::class);
    Route::resource('modulos', ModuloController::class);
    Route::resource('menus-principales', MenuPrincipalController::class);
    Route::resource('menus', MenuController::class);
    Route::resource('roles', RolController::class);
    Route::resource('roles-menus-principales', RolMenuPrincipalController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('gestiones-periodos', GestionPeriodoController::class);

    Route::get('/api/programas/{programa}/materias', function ($programa) {
        $materias = PosgradoMaterias::where('id_posgrado_programa', $programa)->get();
        return response()->json(['materias' => $materias]);
    });

    Route::get('/api/programas/search', function (Request $request) {
        $searchTerm = $request->query('query');
        $programas = PosgradosProgramas::where('nombre', 'ILIKE', "%{$searchTerm}%")->get();
        return response()->json($programas);
    });

    Route::get('/api/programas/{programId}/materias/search', function ($programId, Request $request) {
        $searchTerm = $request->query('query');
        $materias = PosgradoMaterias::where('id_posgrado_programa', $programId)
            ->where('nombre', 'ILIKE', "%{$searchTerm}%")
            ->with('docentes.persona')  // Relación con docentes
            ->get();

        return response()->json(['materias' => $materias]);
    });

    Route::get('/api/programas/{programa}/materias', function ($programa) {
        $materias = \App\Models\PosgradoMaterias::with('docentes.persona') // Incluir la relación con personas
        ->where('id_posgrado_programa', $programa)
            ->get();

        return response()->json(['materias' => $materias]);
    });
    Route::post('/asignar-docente', [AsignacionDocentesController::class, 'store'])->name('asignar.docente');
    Route::get('/posgrados', [AsignacionDocentesController::class, 'index'])->name('posgrado.index');
});

