<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

    <h1>Información del Asociado</h1>
    <div>
        <label>Cedula: <input value="{{ $asociado->cedula }}"></label>
        <label>Nombre: <input value="{{ $asociado->apellido.$asociado->nombre }}"></label>
        <label>Fecha Nacimiento: <input value="12597679"></label>
        <label>Edad: <input value="56"></label>
    </div>

    
    <section class="d-flex align-items-center m-4">
        <div class="d-flex flex-column ">
            <label class="bg-primary">Distrito:<input class="bg-success" value="12597679" readonly></label>
            <label>Direccion: <input value="12597679" readonly></label>
            <label>Ciudad: <input value="12597679" readonly></label>
            <label>Observaciones: <p class="border border-secondary-subtle ">Loremel dicta nostrum, est sequi optio quis sint aperiam ut repellat officia sit.</p></label>
        </div>
        <div>
            <table class="table table-bordered">
                <tr>
                    <th>Cedula</th>
                    <th>Apellidos Nombre</th>
                    <th>Edad</th>
                    <th>Parentezco</th>
                    <th>Fecha Nacimiento</th>
                </tr>
                @foreach($beneficiarios as $beneficiario)
                    <td>{{ $beneficiario->cedula }}</td>
                    <td>{{ $beneficiario->apellido.$beneficiario->nombre }}</td>
                @endforeach
            </table>
        </div>    
    </section>

    <td>{{ $asociado->apellido }}</td>
                        <td>{{ $asociado->distrito_id }}</td>
                        <td>{{ $asociado->direccion }}</td>
                        <td>{{ $asociado->ciudad_id }}</td>
                        <td>{{ $asociado->estado }}</td>
                        <td>{{ $asociado->celular }}</td>
                        <td>{{ $asociado->email }}</td>
                        <td>{{ $asociado->observacion }}</td>
                        <td>{{ $asociado->observacion_familia }}</td>
    <h2>Beneficiarios</h2>
    <ul>
        
        @foreach($beneficiarios as $beneficiario)
            <li>{{ $beneficiario->nombre }}</li>
        @endforeach
        @for ($i = 0; $i < $beneficiarios->count(); $i++)
        <p>{{ $beneficiario->nombre }}</p>
        <p>{{$i}}<p>
        @endfor
    </ul>

    <a href="{{ route('asociados.generarpdf', ['id' => $asociado->cedula]) }}" target="_blank" class="btn btn-primary">Generar PDF</a>



</body>
</html>