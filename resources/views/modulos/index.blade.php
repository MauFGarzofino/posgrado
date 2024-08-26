@extends('layouts.app')

@section('title', 'Módulos')

@section('content')
    <x-navigation-menu-roles />
    <x-datatable
        title="Módulos"
        createRoute="{{ route('modulos.create') }}"
        ajaxRoute="{{ route('modulos.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_modulo', 'name' => 'id_modulo'],
            ['label' => 'Nombre', 'data' => 'nombre', 'name' => 'nombre'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection

