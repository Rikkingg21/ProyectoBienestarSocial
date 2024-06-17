<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personal y Personal CIT</title>
    <!-- Agrega tus estilos CSS aquí -->
    <style>
        .scroll-table {
            max-height: 200px; /* Altura máxima de la tabla con scroll */
            overflow-y: scroll;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr.selected {
            background-color: #d3d3d3;
        }
    </style>
</head>
<body>
    <h1>Listado de Personal y Personal CIT</h1>

    <!-- Formulario para seleccionar el año -->
    <form method="GET" action="{{ route('personals.index') }}">
        <label for="year">Seleccione el año:</label>
        <select name="year" id="year" onchange="this.form.submit()">
            @foreach (range(2020, 2026) as $yr)
                <option value="{{ $yr }}" {{ $year == $yr ? 'selected' : '' }}>{{ $yr }}</option>
            @endforeach
        </select>
    </form>

    <h2>Personales Registrados en {{ $year }}</h2>
    <div class="scroll-table">
        <table>
            <thead>
                <tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Cargo</th>
                    <th>Centro de Trabajo</th>
                    <th>Tipo de Servidor</th>
                    <th>Días Totales</th> <!-- Nueva columna -->
                </tr>
            </thead>
            <tbody>
                @foreach ($personals as $personal)
                    <tr onclick="showPersonalCit('{{ $personal->DNI }}')">
                        <td>{{ $personal->DNI }}</td>
                        <td>{{ $personal->APENOM }}</td>
                        <td>{{ $personal->CARGO }}</td>
                        <td>{{ $personal->CENTRO_TRABAJO }}</td>
                        <td>{{ $personal->TIPO_SERVIDOR }}</td>
                        <td>{{ $personal->DIAS_TOTALES }}</td> <!-- Mostrar Días Totales -->
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <h2>Personal CIT en {{ $year }}</h2>
    <table>
        <thead>
            <tr>
                <th>CIT</th>
                <th>Tipo Prestación Económica</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Colegiado Médico</th>
                <th>Expediente</th>
                <th>Informe</th>
                <th>Días del Periodo</th> <!-- Nueva columna para días del periodo -->
            </tr>
        </thead>
        <tbody id="personalCitBody">
            <!-- Aquí se llenarán los detalles de personal_cit -->
        </tbody>
    </table>

    <!-- Agrega tu script JS aquí -->
    <script>
        const personalCits = @json($personalCits);

        function showPersonalCit(dni) {
            const filteredCits = personalCits.filter(cit => cit.DNI === dni);
            const tbody = document.getElementById('personalCitBody');
            tbody.innerHTML = '';

            filteredCits.forEach(cit => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${cit.CIT}</td>
                    <td>${cit.TIPO_PRESTA_ECONMICA}</td>
                    <td>${cit.F_INICIO}</td>
                    <td>${cit.F_FIN}</td>
                    <td>${cit.COL_MED}</td>
                    <td>${cit.EXPEDIENTE}</td>
                    <td>${cit.INFORME}</td>
                    <td>${cit.DIAS_TOTALES}</td> <!-- Mostrar Días del Periodo -->
                `;
                tbody.appendChild(row);
            });

            // Remover clase 'selected' de todas las filas
            document.querySelectorAll('tbody tr').forEach(tr => tr.classList.remove('selected'));
            // Agregar clase 'selected' a la fila seleccionada
            event.currentTarget.classList.add('selected');
        }
    </script>
</body>
</html>
