@extends('layouts.app')

@section('title', 'Menús')

@section('content')
    <x-datatable
        title="Menús"
        createRoute="{{ route('menus.create') }}"
        ajaxRoute="{{ route('menus.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_menu', 'name' => 'id_menu'],
            ['label' => 'Menú Principal', 'data' => 'menu_principal', 'name' => 'menuPrincipal.nombre'],
            ['label' => 'Nombre', 'data' => 'nombre', 'name' => 'nombre'],
            ['label' => 'Directorio', 'data' => 'directorio', 'name' => 'directorio'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection
