@extends('layouts.app')

@section('title', 'Menús Principales')

@section('content')
    <x-navigation-menu-roles />
    <x-datatable
        title="Menús Principales"
        createRoute="{{ route('menus-principales.create') }}"
        ajaxRoute="{{ route('menus-principales.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_menu_principal', 'name' => 'id_menu_principal'],
            ['label' => 'Módulo', 'data' => 'modulo', 'name' => 'modulo.nombre'],
            ['label' => 'Nombre', 'data' => 'nombre', 'name' => 'nombre'],
            ['label' => 'Icono', 'data' => 'icono', 'name' => 'icono'],
            ['label' => 'Orden', 'data' => 'orden', 'name' => 'orden'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection
