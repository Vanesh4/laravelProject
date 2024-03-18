<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Asociado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/now-ui-dashboard.css?v=1.5.0') }}" rel="stylesheet">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet">
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
                                <input type="text" name="id" value="" class="form-control"
                                    placeholder="Search...">
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
                <form>
                  <div class="row">
                    <div class="col-md-3 pr-1">
                      <div class="form-group">
                        <label>Cedula</label>
                        <input class="form-control" value="{{ $asociado->cedula }}" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" value="{{ $asociado->apellido . " " . $asociado->nombre }}" readonly>
                      </div>
                    </div>
                    <div class="col-md-3 pl-1">
                      <div class="form-group">
                        <label>Fecha Nacimiento:</label>
                        <input class="form-control" value="{{ $asociado->fechaNacimiento }}" readonly></label>
                      </div>
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
                        <input class="form-control" value="{{ $edad }}" readonly></label>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-2 pr-1">
                    <div class="form-group">
                        <label>Distrito</label>
                        <input class="form-control" value="{{ $asociado->distrito_id }}" readonly>
                      
                        <label>Direccion</label>
                        <input class="form-control" value="" readonly></label>
                      
                        <label>Ciudad</label>
                        <input class="form-control" value="" readonly></label>
                      
                        <label>Observaciones</label>
                        <p class="border border-secondary-subtle ">{{ $asociado->observacion }}</p>
                    </div>
                    </div>
                    <div class="col-md-10">
                    <div class="card">
                    <div class="card-header">
                        <h5 class="card-category">All Persons List</h5>
                        <div class="card-body">
                        <div class="table-responsive">
                        <table class="table">
                        
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
                    </div>    
                    </div>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <a href="{{ route('asociados.generarpdf', ['id' => $asociado->cedula]) }}" target="_blank" class="btn btn-primary">Generar PDF</a>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

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
