@extends('layouts.app')

@section('title', 'Configuraciones')

@section('content')
    <x-navigation-menu />
    <x-datatable
        title="Configuraciones"
        createRoute="{{ route('configuraciones.create') }}"
        ajaxRoute="{{ route('configuraciones.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_configuracion', 'name' => 'id_configuracion'],
            ['label' => 'Tipo', 'data' => 'tipo', 'name' => 'tipo'],
            ['label' => 'Descripción', 'data' => 'descripcion', 'name' => 'descripcion'],
            ['label' => 'Universidad', 'data' => 'universidad', 'name' => 'universidad.nombre'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection
