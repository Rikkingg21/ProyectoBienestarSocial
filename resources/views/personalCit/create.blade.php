<!-- resources/views/personalCit/create.blade.php -->
@extends('layouts.app')

@section('title', 'Agregar Personal al CIT')

@section('content')
    <h1>Agregar Personal al CIT</h1>

    <form action="{{ route('personalCit.store') }}" method="POST">
        @csrf
        <label for="personal_id">Personal:</label>
        <select id="personal_id" name="personal_id" required>
            @foreach($personals as $personal)
                <option value="{{ $personal->id }}">{{ $personal->APENOM }}</option>
            @endforeach
        </select>

        <label for="CIT">CIT:</label>
        <input type="text" id="CIT" name="CIT" required>

        <label for="TIPO_PRESTA_ECONMICA">Tipo Prestación Económica:</label>
        <input type="text" id="TIPO_PRESTA_ECONMICA" name="TIPO_PRESTA_ECONMICA" required>

        <label for="F_INICIO">Fecha de Inicio:</label>
        <input type="date" id="F_INICIO" name="F_INICIO" required>

        <label for="F_FIN">Fecha de Fin:</label>
        <input type="date" id="F_FIN" name="F_FIN" required>

        <label for="COL_MED">Colegiado Médico:</label>
        <input type="text" id="COL_MED" name="COL_MED" required>

        <label for="EXPEDIENTE">Expediente:</label>
        <input type="text" id="EXPEDIENTE" name="EXPEDIENTE" required>

        <label for="INFORME">Informe:</label>
        <input type="text" id="INFORME" name="INFORME" required>

        <button type="submit">Guardar</button>
    </form>
@endsection
