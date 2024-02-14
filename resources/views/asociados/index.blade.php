<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Lista de Asociados</h1>

    
    
    <!-- Mostrar todos los asociados -->
    <ul>
        @foreach ($asociados as $asociado)
        <div>
            <p>Detalles del Asociado:</p>
            <p>ID: {{ $asociado->cedula }}</p>
            <p>Nombre: {{ $asociado->nombre }}</p>
            <!-- Mostrar más detalles según sea necesario -->
        </div>
        @endforeach
    </ul>
    
    <form action="{{ route('asociados.show', ['asociado' => 'ID']) }}" method="GET">
        <input type="text" name="id" placeholder="Buscar por ID">
        <button type="submit">Buscar</button>
    </form>

</body>
</html>