@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Gestiones Periodos</h2>
        <a href="{{ route('gestiones-periodos.create') }}" class="btn btn-primary">Crear Nuevo Periodo</a>

        <table class="table mt-3">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
            </tr>
            </thead>
            <tbody>
            @foreach($gestionesPeriodos as $gestion)
                <tr>
                    <td>{{ $gestion->nombre }}</td>
                    <td>{{ $gestion->fecha_inicio }}</td>
                    <td>{{ $gestion->fecha_fin }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
