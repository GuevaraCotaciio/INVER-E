<head>
    <title>Inver-E / Usuarios-datos</title>
</head>

<!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->

   <!-- ======= Content  ======= -->
  <main class="col-12 ps-1 pb-3" style="background-color: #e8edf4;">

    <!-- Tirulos modulos-->
    <div class="pagetitle ps-4">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('usuarios.general') }}">Usuarios</a></li>
          <li class="breadcrumb-item"><a href="{{ route('usuarios.general') }}">Registro</a></li>
          <li class="breadcrumb-item active">Datos</li>
        </ol>
      </nav>
    </div>

    <div class="card ms-2 me-3">
      <div class="card-body m-4">

        @if(isset($datosuser) == TRUE)

        <h4 class="card-title mb-5">Completa los siguientes datos del usuario</h4>

        <!-- ======== Formulario General Persona ======== -->
        <form method="POST" action="{{ route('usuarios.save') }}"  enctype="multipart/form-data">
            @csrf

        @foreach ($datosuser as $user )

            <input type="radio" name="tipo" value="Persona" checked hidden>
            <input type="radio" name="estado" value="Activo" checked hidden>
            <input type="radio" name="tipopersona" value="Usuario" checked hidden>
            <input type="radio" name="id_user" value="{{ $user->id }}" checked hidden>
            <input type="email" name="email" value="{{ $user->email }}" hidden>
            <input type="text" name="username" value="{{ $user->name }}" hidden>

            <div class="row col-lg-12 pe-0">

                <div class="col-lg-2">  <!-- foto del clinte -->

                    <div class="card p-0 border-0">
                        <p class="small m-0 p-0">{{ $user->name }}</p>
                        <img class="border-0" src="/public/default.png" alt="avatar" style="height: 130px;">
                    </div>

                    <div class="card-body ps-0">
                        <div class="input-group ">
                            <div class="custom-file me-2">
                                <input type="file" hidden  class="custom-file-input" id="inputFile" name="archivo_cliente">
                                <a class="btn btn-success" title="Cargar nueva imagen" name="imagen">
                                    <label class="custom-file-label" for="inputFile"><i class="bi bi-upload"></i></label>
                                </a>
                            </div>
                            <button type="reset" class="btn btn-danger" title="Eliminar la imagen"><i class="bi bi-trash"></i></button>
                        </div>
                    </div>
                </div>

                <div class="col-lg-10 pe-0">

                    <div class="row mb-3 pe-0">
                      <label for="inputText" class="col-2 col-form-label">Nombres y apellidos</label>

                      <div class="col-10 pe-0">
                        <div class="input-group">
                          <input type="text" name="name" required class="form-control form-control-lg" placeholder="* Nombres">
                          <input type="text" name="lastname" required class="form-control form-control-lg" placeholder="* Apellidos">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="inputText"  class="col-2 col-form-label">Documento</label>

                      <div class="col-10 pe-0">
                        <div class="input-group">
                          <select class="form-select form-select-lg" required name="tipoDoc">
                            <option selected>Seleccione el tipo documento</option>
                            <option value="CC">Cédula Ciudadania</option>
                            <option value="CE">Cédula Extrangeria</option>
                            <option value="TI">Tarjeta Identidad</option>
                          </select>
                          <input type="text" required name="document" class="form-control form-control-lg" placeholder="* Número documento">
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label class="col-sm-2 col-form-label">Genero</label>
                      <div class="col-sm-10 pe-0">
                        <select class="form-select form-select-lg" required name="genero">
                          <option selected="">Selecciona el genero</option>
                          <option value="Hombre">Hombre</option>
                          <option value="Mujer">Mujer</option>
                        </select>
                      </div>
                    </div>

                </div>

            </div>

            <div class="row mb-3">
              <label for="fechaN" class="col-sm-2 col-form-label">Fecha Nacimiento</label>
              <div class="col-sm-10">
                <input class="form-control border p-2" required type="date" id="fechaN" name="age"/>
              </div>
            </div>

            <div class="row mb-3">
              <label for="number" class="col-sm-2 col-form-label">Teléfono</label>
              <div class="col-sm-10">
                <input type="number" required class="form-control form-control-lg" name="phone" placeholder="* Número celular">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputcity" class="col-sm-2 col-form-label">Ciudad</label>
              <div class="col-sm-10">
                <input type="text" required id="inputcity" class="form-control form-control-lg" name="city" placeholder="* Localidad">
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputadress" class="col-sm-2 col-form-label">Dirección</label>
              <div class="col-sm-10">
                <input type="text" required class="form-control form-control-lg" name="adress" placeholder="* Calle ...">
              </div>
            </div>

            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Cargo</label>
                <div class="col-sm-10 pe-0">
                    <select class="form-select form-select-lg" required name="cargo">
                        <option selected="">Selecciona</option>
                        @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            <!-- Envio Formulario -->
            <div class="row  pt-3 pb-3 col-sm-12 align-items-center justify-content-center">
              <div class="col-4"></div>
              <div class="col-2"><button type="submit" class="btn btn-success btn-lg ">Guardar</button></div>
              <div class="col-2"><a href="{{ route('usuarios.general') }}" class="btn btn-info btn-lg  muted">Cancelar</a></div>
              <div class="col-4"></div>
            </div>
        @endforeach
        </form>



        @else
        <h4 class="card-title mb-5">No hay datos del usuario creado</h4>
        @endif


      </div>
    </div>
  </main>


  <!-- ======= Footer ======= -->
  @include('Templates.footer')
