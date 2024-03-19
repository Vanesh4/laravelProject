<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalle Asociado</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
  @include('navbar')

  <div class="main-panel" id="main-panel">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
      <div class="container-fluid">
        <div class="navbar-wrapper">
          <div class="navbar-toggle">
            <button type="button" class="navbar-toggler">
              <span class="navbar-toggler-bar bar1"></span>
              <span class="navbar-toggler-bar bar2"></span>
              <span class="navbar-toggler-bar bar3"></span>
            </button>
          </div>
          <a class="navbar-brand" href="#pablo">ASOCIADO - BENEFICIARIOS</a>
        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
          <span class="navbar-toggler-bar navbar-kebab"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
          {{-- Buscador Cedulaaaa --}}
          <form action="{{ route('asociados.show', ['asociado' => 'ID']) }}" method="GET">
            <div class="input-group no-border">
              <input type="text" name="id" value="" class="form-control" placeholder="Search...">
              <div class="input-group-append">
                <button class="input-group-text" type="submit">
                  <i class="now-ui-icons ui-1_zoom-bold"></i>
                </button>
              </div>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#pablo">
                <i class="now-ui-icons users_single-02"></i>
                <p>
                  <span class="d-lg-none d-md-block">Account</span>
                </p>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="panel-header panel-header-sm">
    </div>

    <div class="content">
      <div class="row">
        <div class="col-md-11 ml-auto mr-auto">
          <div class="card">
            <div class="card-header">
              <h5 class="title">Información del Asociado</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-2 pr-1">
                  <div class="form-group">
                    <label for="cedula">Cedula</label>
                    <div class="form-control">{{ $asociado->cedula }}</div>
                  </div>
                </div>
                <div class="col-md-4 px-1">
                  <div class="form-group">
                    <label>Nombre</label>
                    <div class="form-control">{{ $asociado->apellido . " " . $asociado->nombre }}</div>
                  </div>
                </div>

                <form class="col-md-3 pl-1" id="FormFechaUpdate" method="POST">
                  @csrf
                  @method('PUT')
                  <label for="fechaNacimiento">Fecha Nacimiento:</label>
                  <div class="d-flex">
                    <input class="col-md-11 form-control" id="fechaInput" type="date" name="fechaNacimiento">
                    <script>
                      document.addEventListener('DOMContentLoaded', function() {
                        var fechaDesdeBD = "{{ $asociado->fechaNacimiento }}";
                        document.getElementById('fechaInput').value = fechaDesdeBD;
                      });
                    </script>
                    <button class="input-group-text" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit"><i class="now-ui-icons loader_refresh"></i></button>
                  </div>
                </form>

                <div class="col-md-2 pl-3">
                  <div class="form-group">
                    @php
                    $fecNac = new DateTime($asociado->fechaNacimiento);
                    $fechaActual = new DateTime();
                    $diferencia = $fecNac->diff($fechaActual);
                    $edad = $diferencia->y;
                    @endphp
                    <label>Edad</label>
                    <div class="form-control">{{$edad}}</div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-2 pr-1">
                    <div class="form-group">
                      <label>Distrito</label>
                      <div class="form-control">{{ $asociado->distrito_id }}</div>

                      <label>Direccion</label>
                      <div class="form-control">{{ $asociado->direccion }}</div>

                      <label>Ciudad</label>
                      <div class="form-control">{{ $asociado->ciudad_id }}</div>

                      <label>Observaciones</label>
                      <p class="border border-secondary-subtle p-3">{{ $asociado->observacion_familia }}</p>
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-category">Beneficiarios</h5>
                        <div class="card-body">
                          <form method="POST">
                            @csrf
                            <div class="table-responsive">
                              <table class="table">

                                <tr>
                                  <th>Cédula</th>
                                  <th>Apellidos Nombre</th>
                                  <th>Parentezco</th>
                                  <th>Fecha Nacimiento</th>
                                  <th>Edad</th>
                                </tr>

                                @foreach ($beneficiarios as $beneficiario)
                                <tr>
                                  <td>{{ $beneficiario->cedula }}</td>
                                  <td>{{ $beneficiario->apellido . $beneficiario->nombre }}</td>
                                  <td>{{ $beneficiario->paretentezco }}</td>
                                  <input type="hidden" name="ids[]" value="{{ $beneficiario->cedula }}">
                                  <td><input type="date" name="fechas[]" class="form-control" value="{{ $beneficiario->fechaNacimiento }}"></td>
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
                              <button type="submit">Actualizar fechas</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <a href="{{ route('asociados.generarpdf', ['id' => $asociado->cedula]) }}" target="_blank" class="btn btn-primary">Generar PDF</a>
                      <!-- Button trigger modal -->
                      @if (session('success'))
                      <p class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                  </div>
                </div>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Launch demo modal
                </button>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Estás seguro de que deseas actualizar la fecha
          </div>
          <div class="modal-footer">
            <button type="button" id="confirmarEnvio" class="btn btn-primary">Si</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        // Obtener el formulario y el botón de confirmación del modal
        const formulario = document.getElementById('FormFechaUpdate');
        const botonConfirmar = document.getElementById('confirmarEnvio');

        // Agregar un evento al formulario para abrir el modal cuando se envíe
        formulario.addEventListener('submit', function(event) {
          event.preventDefault(); // Evitar el envío automático del formulario
          $('#exampleModal').modal('show'); // Mostrar el modal de confirmación
        });


        botonConfirmar.addEventListener('click', function() {
          $('#exampleModal').modal('hide');
          var cedula = "{{ $asociado->cedula }}"; // Obtener la cédula del asociado
          var fechaNacimiento = $('#fechaNacimiento').val(); // Obtener la fecha de nacimiento del input

          const nuevaFecha = fechaInput.value;
          const url = `/asociados/${cedula}`;

          $.ajax({
            url: "{{ route('asociados.update', ['asociado' => $asociado->cedula]) }}",
            method: 'PUT',
            data: {
                fechaNacimiento: nuevaFecha,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                console.log('Datos actualizados correctamente');
                // Aquí puedes hacer algo después de que los datos se hayan actualizado
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar los datos al servidor:', error);
            }
          });
          
        });
      });
    </script>
    <!-- <div class="body m-4">
        <h1>Información del Asociado</h1>
        <div>
            <label>Cedula: <input value="{{ $asociado->cedula }}" readonly></label>
            <label>Nombre: <input value="{{ $asociado->apellido . " " . $asociado->nombre }}" readonly></label>
            <label>Fecha Nacimiento: <input value="{{ $asociado->fechaNacimiento }}" readonly></label>
            <label>Edad: <input value="" readonly></label>
        </div>

        <section class="d-flex align-items-center justify-content-around m-4 section">
            <div class="d-flex flex-column ">
                <label>Distrito:<input value="{{ $asociado->distrito_id }}" readonly></label>
                <label>Direccion: <input value="{{ $asociado->direccion }}" readonly></label>
                <label>Ciudad: <input value="{{ $asociado->ciudade ? $asociado->ciudade->nombre : ' ' }}" readonly></label>
                {{-- <label>Ciudad: <input value="{{ $asociado->ciudade->nombre }}" readonly></label> --}}
                <label>Observaciones: <p class="border border-secondary-subtle ">{{ $asociado->observacion }}</p>
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
                            <td>{{ $beneficiario->paretentezco }}</td>
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
    </div> -->
</body>

</html>