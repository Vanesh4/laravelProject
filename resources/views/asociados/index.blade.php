<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <h1>Lista de Asociados</h1>
    <form action="{{ route('asociados.show', ['asociado' => 'ID']) }}" method="GET">
        <input type="text" name="id" placeholder="Buscar por cedula">
        <button type="submit">Buscar</button>
    </form>

    <!-- Mostrar todos los asociados -->
    <div class="mx-3">
        <table class="table">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Distrito ID</th>
                    <th>Dirección</th>
                    <th>Ciudad ID</th>
                    <th>Estado</th>
                    <th>Celular</th>
                    <th>Email</th>
                    <th>Observación Familia</th>
                    <th>Observación</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($asociados as $asociado)
                    <tr>
                        <td>{{ $asociado->cedula }}</td>
                        <td>{{ $asociado->apellido }}</td>
                        <td>{{ $asociado->nombre }}</td>
                        <td>{{ $asociado->distrito_id }}</td>
                        <td>{{ $asociado->direccion }}</td>
                        <td>{{ $asociado->ciudad_id }}</td>
                        <td>{{ $asociado->estado }}</td>
                        <td>{{ $asociado->celular }}</td>
                        <td>{{ $asociado->email }}</td>
                        <td>{{ $asociado->observacion }}</td>
                        <td>{{ $asociado->observacion_familia }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>