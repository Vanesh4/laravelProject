<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    
    <!-- <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet">
    
    <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet"> -->

</head>

<body>
    <div class="body m-4">
        <h1>Información del Asociado</h1>
        <div>            
            <label>Cedula: <div class="border border-primary p-3">{{ $asociado->cedula }}</div></label>
            <label>Nombre: <input value="{{ $asociado->apellido . " " . $asociado->nombre }}"></label>
            <label>Fecha Nacimiento: <input value="{{ $asociado->fechaNacimiento }}"></label>
            @if($asociado->fechaNacimiento != '0000-00-00')
            @php
            $fecNac = new DateTime($asociado->fechaNacimiento);
            $fechaActual = new DateTime();
            $diferencia = $fecNac->diff($fechaActual);
            $edad = $diferencia->y;
            @endphp
            <label>Edad: <input value="{{$edad}}"></label>
            @else
            <label>Edad: <input value="0"></label>
            @endif
        </div>

        <section class="d-flex align-items-center justify-content-around m-4 section">
            <div class="d-flex flex-column ">
            <label>Distrito:
                @if ($asociado->distrito !== null && $asociado->distrito !== 0)
                    <input value="{{ $asociado->distrito->id }}" readonly>
                @else
                    <input value="{{ $asociado->distrito }}" readonly>
                @endif
                </label>
                <label>Direccion: <input value="{{ $asociado->direccion }}" readonly></label>
                @if ($asociado->ciudad_id !== null && $asociado->ciudad_id !== 0)
                <input value="{{ $asociado->ciudade->nombre }}" readonly>
                @else
                <input value="{{ $asociado->ciudade }}" readonly>
                @endif
                <label>Ciudad: </label>
                {{-- <label>Ciudad: <input value="{{ $asociado->ciudade->nombre }}" readonly></label> --}}
                <label>Observaciones: <p class="border border-secondary-subtle rounded">{{ $asociado->observacion }}</p>
                </label>
            </div>
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>Cedula</th>
                        <th>Apellidos Nombre</th>
                        <th>Parentezco</th>
                        <th>Fecha Nacimiento</th>
                        <th>Edad</th>
                    </tr>
                    @foreach ($beneficiarios as $beneficiario)
                    <tr>
                        <td>{{ $beneficiario->cedula }}</td>
                        <td>{{ $beneficiario->apellido . $beneficiario->nombre }}</td>
                        @if ($beneficiario->parentesco !== null && $beneficiario->parentesco !== 0)
                        <td>{{ $beneficiario->parentescoo->nomPar }}</td>
                        @else
                        <td>{{ $beneficiario->parentesco }}</td>
                        @endif
                        <td>{{ $beneficiario->fechaNacimiento }}</td>

                        @php
                            $fecNac = new DateTime($beneficiario->fechaNacimiento);
                            $fechaActual = new DateTime();
                            $diferencia = $fecNac->diff($fechaActual);
                            $edad = $diferencia->y;
                        @endphp

                        <td>{{ $edad }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </section>
    </div>
</body>

</html>