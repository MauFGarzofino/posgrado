<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RolMenuPrincipalController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

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
});

