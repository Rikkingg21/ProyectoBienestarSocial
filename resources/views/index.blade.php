<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Personal</title>
    <!-- Agrega tus estilos CSS aquí -->
</head>
<body>
    <h1>Listado de Personal</h1>
    <table border="1">
        <thead>
            <tr>
                <th>DNI</th>
                <th>Nombre</th>
                <th>Cargo</th>
                <th>Centro de Trabajo</th>
                <th>Tipo de Servidor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($personals as $personal)
                <tr>
                    <td>{{ $personal->DNI }}</td>
                    <td>{{ $personal->APENOM }}</td>
                    <td>{{ $personal->CARGO }}</td>
                    <td>{{ $personal->CENTRO_TRABAJO }}</td>
                    <td>{{ $personal->TIPO_SERVIDOR }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
