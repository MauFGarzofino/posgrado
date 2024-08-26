@extends('layouts.app')

@section('title', 'Facultades')

@section('content')
    <x-navigation-menu />
    <x-datatable
        title="Facultades"
        createRoute="{{ route('facultades.create') }}"
        ajaxRoute="{{ route('facultades.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_facultad', 'name' => 'id_facultad'],
            ['label' => 'Nombre', 'data' => 'nombre', 'name' => 'nombre'],
            ['label' => 'Nombre Abreviado', 'data' => 'nombre_abreviado', 'name' => 'nombre_abreviado'],
            ['label' => 'Área', 'data' => 'area', 'name' => 'area.nombre'],
            ['label' => 'Dirección', 'data' => 'direccion', 'name' => 'direccion'],
            ['label' => 'Teléfono', 'data' => 'telefono', 'name' => 'telefono'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection
