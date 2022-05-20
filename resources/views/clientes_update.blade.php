<head>
    <title>Inver-E / Clientes-Actualizar</title>
</head>

<!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->

   <!-- ======= Content  ======= -->
  <main class="col-12 ps-1 pb-3" style="background-color: #e8edf4;">

    <!-- Tirulos modulos-->
    <div class="pagetitle ps-4">
      <h1>Clientes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('clientes_general') }}">Clientes</a></li>
          <li class="breadcrumb-item active">Actualizar</li>
        </ol>
      </nav>
    </div>

    <div class="card ms-2 me-3">
      <div class="card-body m-4">
        <h4 class="card-title mb-5">Actualizar Cliente</h4>

        <!-- ======== Formulario General ======== -->
        @foreach ($datoscliente as $cliente )
        <form action="{{ route('clientes.edit', $cliente->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="number" hidden name="IDCliente"  value="{{ $cliente->id_cliente }}">
            <div class=" row col-lg-12 mb-4">

                <div class="col-lg-2">  <!-- foto del clinte -->

                  <div class="card p-0 border-0">
                      <img src="{{ Storage::url($cliente->avatar) }}" alt="" width="110px">
                  </div>

                  <div class="card-body ps-0">
                      <div class="input-group ">
                          <div class="custom-file me-2">
                              <input type="file" hidden class="custom-file-input" id="inputFile" name="archivo_cliente">
                              <a class="btn btn-success" title="Cargar nueva imagen" name="imagen">
                                  <label class="custom-file-label" for="inputFile"><i class="bi bi-upload"></i></label>
                              </a>

                          </div>
                          <button type="reset" class="btn btn-danger" title="Eliminar la imagen"><i class="bi bi-trash"></i></button>
                      </div>
                  </div>
                </div>

                <div class=" row col-lg-6">
                    <div class="col-lg-1"></div>

                    <label class="col-5 col-form-label pb-0"><h5>Fecha creado</h5> <span class="col-5 col-form-label text-muted pt-0">{{ $cliente->creado }}</span></label>
                    <label class="col-5 col-form-label pb-0"><h5>Estado cliente</h5> <span class="col-5 col-form-label text-muted pt-0">{{ $cliente->estado_cliente }}</span></label>
                    <div class="col-lg-1"></div>


                </div>
            </div>

          <div class="row mb-3">
            <label for="inputText" class="col-2 col-form-label">Nombres y apellidos</label>

            <div class="col-10">
              <div class="input-group">
                <input type="text" name="Firstname" class="form-control form-control-lg" placeholder="* Nombres" value="{{ $cliente->nombre }}">
                <input type="text" name="Lastname" class="form-control form-control-lg" placeholder="* Apellidos" value="{{ $cliente->apellido }}">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-2 col-form-label">Documento</label>

            <div class="col-10">
              <div class="input-group">

                <select class="form-select form-select-lg" name="tipoDoc">
                  <option >Seleccione el tipo documento</option>

                    @if($cliente->tipo_documento == "CC")
                        <option selected value="CC">Cédula Ciudadania</option>
                        <option value="CE">Cédula Extrangeria</option>
                        <option value="TI">Tarjeta Identidad</option>
                    @elseif ($cliente->tipo_documento == "CE")
                        <option value="CC">Cédula Ciudadania</option>
                        <option selected value="CE">Cédula Extrangeria</option>
                        <option value="TI">Tarjeta Identidad</option>
                    @elseif ($cliente->tipo_documento == "TI")
                        <option value="CC">Cédula Ciudadania</option>
                        <option value="CE">Cédula Extrangeria</option>
                        <option selected value="TI">Tarjeta Identidad</option>
                    @endif
                </select>

                <input type="text" name="document" class="form-control form-control-lg" placeholder="* Número documento" value="{{ $cliente->documento }}">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="age" class="col-sm-2 col-form-label">Tipo de cliente</label>
            <div class="col-sm-10">
                <input type="text" class="form-control form-control-lg" name="TipCliente" value="{{ $cliente->tipo_cliente}}">
            </div>
          </div>


          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Genero</label>
            <div class="col-sm-10">
              <select class="form-select form-select-lg" name="genero">
                <option>Selecciona el genero</option>
                @if($cliente->genero == "Hombre")
                    <option selected value="Hombre">Hombre</option>
                    <option value="Mujer">Mujer</option>
                @elseif ($cliente->genero == "Mujer")
                    <option value="Hombre">Hombre</option>
                    <option selected value="Mujer">Mujer</option>
                @endif
              </select>
            </div>
          </div>

          <div class="row mb-3">
            <label for="age" class="col-sm-2 col-form-label">Fecha Nacimiento</label>
            <div class="col-sm-10">
              <input type="date" class="form-control form-control-lg" name="age" value="{{ $cliente->fecha_nacimiento}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="number" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-10">
              <input type="number" class="form-control form-control-lg" name="phone" value="{{ $cliente->telefono}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputcity" class="col-sm-2 col-form-label">Ciudad</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" name="city" value="{{ $cliente->ciudad}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputadress" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-10">
              <input type="text" class="form-control form-control-lg" name="adress" value="{{ $cliente->direccion}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Correo Electronico</label>
            <div class="col-sm-10 ">
              <input type="email" class="form-control form-control-lg" name="email" value="{{ $cliente->email}}">
            </div>
          </div>

          <div class="row mb-3">

            <div class=" row col-sm-10 ps-4">

              <div class="form-check form-switch col-5 pt-2">
                <input class="form-check-input" hidden type="radio" name="tipopersona" id="flexRadioDefault1" checked value="Cliente">
              </div>

            </div>
          </div>

          <!-- Envio Formulario -->
          <div class="row  pt-3 pb-3 col-sm-12 align-items-center justify-content-center">
            <div class="col-4"></div>
            <div class="col-2">
              <button type="submit" class="btn btn-success btn-lg ">Actualizar</button>
            </div>
            <div class="col-2">
              <a href="{{ route('clientes_general') }}" class="btn btn-info btn-lg  muted">Cancelar</a>
            </div>
            <div class="col-4"></div>
          </div>


        </form>
        @endforeach

      </div>
    </div>
  </main>


  <!-- ======= Footer ======= -->
  @include('Templates.footer')
