<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if(isset($asociado))
        @if($asociado)
            <div>
                <p>Detalles del Asociado:</p>
                <p>ID: {{ $asociado->cedula }}</p>
                <p>Nombre: {{ $asociado->nombre }}</p>
                <!-- Mostrar más detalles según sea necesario -->
            </div>
        @else
            <p>El asociado no fue encontrado.</p>
        @endif
    @endif
</body>
</html>