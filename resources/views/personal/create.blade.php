<!-- resources/views/personal/create.blade.php -->
@extends('layouts.app')

@section('title', 'Agregar Personal')

@section('content')
    <h1>Agregar Personal</h1>

    <form action="{{ route('personal.store') }}" method="POST">
        @csrf
        <label for="DNI">DNI:</label>
        <input type="text" id="DNI" name="DNI" required>

        <label for="APENOM">Nombre:</label>
        <input type="text" id="APENOM" name="APENOM" required>

        <label for="CARGO">Cargo:</label>
        <input type="text" id="CARGO" name="CARGO" required>

        <label for="CENTRO_TRABAJO">Centro de Trabajo:</label>
        <input type="text" id="CENTRO_TRABAJO" name="CENTRO_TRABAJO" required>

        <label for="TIPO_SERVIDOR">Tipo de Servidor:</label>
        <input type="text" id="TIPO_SERVIDOR" name="TIPO_SERVIDOR" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
