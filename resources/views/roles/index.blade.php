@extends('layouts.app')

@section('title', 'Roles')

@section('content')
    <x-navigation-menu-roles />
    <x-datatable
        title="Roles"
        createRoute="{{ route('roles.create') }}"
        ajaxRoute="{{ route('roles.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_rol', 'name' => 'id_rol'],
            ['label' => 'Nombre', 'data' => 'nombre', 'name' => 'nombre'],
            ['label' => 'Descripción', 'data' => 'descripcion', 'name' => 'descripcion'],
            ['label' => 'Menús Principales', 'data' => 'menus_principales', 'name' => 'menusPrincipales.nombre'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection

