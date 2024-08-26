@extends('layouts.app')

@section('title', 'Roles y Menús Principales')

@section('content')
    <x-navigation-menu-roles />
    <x-datatable
        title="Roles y Menús Principales"
        createRoute="{{ route('roles-menus-principales.create') }}"
        ajaxRoute="{{ route('roles-menus-principales.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_rol_menu_principal', 'name' => 'id_rol_menu_principal'],
            ['label' => 'Rol', 'data' => 'rol', 'name' => 'rol.nombre'],
            ['label' => 'Menú Principal', 'data' => 'menu_principal', 'name' => 'menuPrincipal.nombre'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection

