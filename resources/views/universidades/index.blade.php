@extends('layouts.app')

@section('title', 'Universidades')

@section('content')
    <x-navigation-menu />
    <x-datatable
        title="Universidades"
        createRoute="{{ route('universidades.create') }}"
        ajaxRoute="{{ route('universidades.index') }}"
        :columns="[
            ['label' => 'No', 'data' => 'id_universidad', 'name' => 'id_universidad'],
            ['label' => 'Nombre', 'data' => 'nombre', 'name' => 'nombre'],
            ['label' => 'Nombre Abreviado', 'data' => 'nombre_abreviado', 'name' => 'nombre_abreviado'],
            ['label' => 'Inicial', 'data' => 'inicial', 'name' => 'inicial'],
            ['label' => 'Estado', 'data' => 'estado', 'name' => 'estado'],
        ]"
    />
@endsection
