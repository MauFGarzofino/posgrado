<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\FacultadController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuPrincipalController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\RolMenuPrincipalController;
use App\Http\Controllers\UniversidadController;
use Illuminate\Support\Facades\Route;

// Ruta principal (home)
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('universidades', [UniversidadController::class, 'index'])->name('universidades.index');
Route::get('menus', [MenuController::class, 'index'])->name('menus.index');

Route::resource('universidades', UniversidadController::class);
Route::resource('configuraciones', ConfiguracionController::class);
Route::resource('areas', AreaController::class);
Route::resource('facultades', FacultadController::class);
Route::resource('modulos', ModuloController::class);
Route::resource('menus-principales', MenuPrincipalController::class);
Route::resource('menus', MenuController::class);
Route::resource('roles', RolController::class);
Route::resource('roles-menus-principales', RolMenuPrincipalController::class);
