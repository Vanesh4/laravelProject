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

                <div class="col-md-3">
                  <form id="FormFechaUpdate" method="POST">
                    <div class="form-group">
                      <label for="fechaNacimiento" class="form-label">Fecha Nacimiento:</label>
                      <div class="input-group">
                        <input class="form-control" id="fechaInput" type="date" name="fechaNacimiento">
                        <button class="btn form-control m-0 p-0" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit">Actualizar</button>
                      </div>
                      <script>
                        document.addEventListener('DOMContentLoaded', function() {
                          var fechaDesdeBD = "{{ $asociado->fechaNacimiento }}";
                          document.getElementById('fechaInput').value = fechaDesdeBD;
                        });
                      </script>
                    </div>
                  </form>
                </div>

                <div class="col-md-2 pl-1">
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
                      
                      @if ($asociado->distrito !== null && $asociado->distrito !== 0)
                      <div class="form-control">{{ $asociado->distrito->id }}</div>
                      @else
                      <div class="form-control">{{ $asociado->distrito }}</div>
                      @endif

                      <label>Direccion</label>
                      <div class="form-control">{{ $asociado->direccion }}</div>

                      <label>Ciudad</label>
                      @if ($asociado->ciudad_id !== null && $asociado->ciudad_id !== 0)
                      <div class="form-control">{{ $asociado->ciudade->nombre }}</div>
                      @else
                      <div class="form-control">{{ $asociado->ciudade }}</div>
                      @endif
                      <label>Observaciones</label>
                      <p class="border border-secondary-subtle p-3 rounded">{{ $asociado->observacion_familia }}</p>
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div class="card">
                      <div class="card-header">
                        <h5 class="card-category">Beneficiarios</h5>
                        <div class="card-body">
                          <form method="POST" id="fechasBeneficiarios">
                            @csrf
                            @method('PUT')
                            <div class="table-responsive">
                              <table class="table">
                                <tr>
                                  <th>Cédula</th>
                                  <th>Apellidos Nombre</th>
                                  <th>Parentesco</th>
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
                              <button class="input-group-text" type="submit">Actualizar fechas</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="row">
                  <div class="col-md-auto">
                    <div class="form-group">
                      <a href="{{ route('asociados.generarpdf', ['id' => $asociado->cedula]) }}" target="_blank" class="btn btn-primary">Generar PDF</a>
                    </div>
                  </div>
                </div>
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
            <button type="button" class="btn btn-secondary" id="botonNo">No</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="ModalBeneficiarios" tabindex="-1" aria-labelledby="ModalBeneficiariosLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ¿Estás seguro de que deseas actualizar la fecha
          </div>
          <div class="modal-footer">
            <button type="button" id="confirmarEnvioBene" class="btn btn-primary">Si</button>
            <button type="button" class="btn btn-secondary" id="botonNoBene">No</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        //asociado
        const formulario = document.getElementById('FormFechaUpdate');
        const botonConfirmar = document.getElementById('confirmarEnvio');

        formulario.addEventListener('submit', function(event) {
          event.preventDefault();
          $('#exampleModal').modal('show');
        });

        const botonCerrarModal = document.getElementById('botonNo')
        botonCerrarModal.addEventListener('click', function() {
          $('#exampleModal').modal('hide');
          location.reload();
        })

        botonConfirmar.addEventListener('click', function() {
          $('#exampleModal').modal('hide');
          var cedula = "{{ $asociado->cedula }}"; // Obtener la cédula del asociado
          var fechaNacimiento = $('#fechaNacimiento').val(); // Obtener la fecha de nacimiento del input

          const nuevaFecha = fechaInput.value;
          //const url = `/asociados/${cedula}`;

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

        //beneficiarios
        const formularioBene = document.getElementById('fechasBeneficiarios');
        const confirmarEnvioBene = document.getElementById('confirmarEnvioBene');

        formularioBene.addEventListener('submit', function(event) {
          event.preventDefault();
          $('#ModalBeneficiarios').modal('show');
        });

        const botonCerrarBene = document.getElementById('botonNoBene')
        botonCerrarBene.addEventListener('click', function() {
          $('#ModalBeneficiarios').modal('hide');
          location.reload();
        })

        confirmarEnvioBene.addEventListener('click', function() {
          $('#ModalBeneficiarios').modal('hide');

          var formData = $(formularioBene).serialize();
          $.ajax({
            type: 'PUT',
            url: "{{ route('beneficiarios.update',['beneficiario' => $asociado->cedula]) }}",
            data: formData,
            _token: '{{ csrf_token() }}',
            success: function(response) {
              console.log("Datos actualizados");
              location.reload();
            },
            error: function(xhr, status, error) {
              console.error(error);
            }
          });
        });
      });
    </script>
</body>
</html>