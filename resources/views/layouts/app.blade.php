<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestión de Personal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body { font-family: Arial, sans-serif; }
        nav ul { list-style: none; padding: 0; }
        nav ul li { display: inline; margin-right: 10px; }
        .container { margin: 20px; }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ route('personals.index') }}">Inicio</a></li>
            <li><a href="{{ route('personal.create') }}">Agregar Personal</a></li>
            <li><a href="{{ route('personalCit.create') }}">Agregar Personal al CIT</a></li>
        </ul>
    </nav>

    <div class="container">
        @yield('content')
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
