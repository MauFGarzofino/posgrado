@extends('layouts.app')

@section('title', 'Áreas')

@section('content')
    <x-navigation-menu />
    <x-datatable
        title="Áreas"
        createRoute="{{ route('areas.create') }}"
        ajaxRoute="{{ route('areas.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_area', 'name' => 'id_area'],
            ['label' => 'Nombre', 'data' => 'nombre', 'name' => 'nombre'],
            ['label' => 'Nombre Abreviado', 'data' => 'nombre_abreviado', 'name' => 'nombre_abreviado'],
            ['label' => 'Universidad', 'data' => 'universidad', 'name' => 'universidad.nombre'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection
