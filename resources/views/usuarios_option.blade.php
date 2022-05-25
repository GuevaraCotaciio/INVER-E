<head>
    <title>Inver-E / Usuarios-Información</title>
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
          <li class="breadcrumb-item active">Información</li>
        </ol>
      </nav>
    </div>

    <div class="card ms-2 me-3">
      <div class="card-body m-4">

        <div class="row col-12">
          <div class="col-9"><h4 class="card-title mb-5">Datos Personales.</h4></div>
          <div class="col-1"><a href="{{ route('usuarios.general') }}" class="btn btn-info btn-lg">Atras</a></div>
          <div class="col-1"><a href="{{ route('usuarios.update', $usuario->id) }}"class="btn btn-warning btn-lg">Editar</a></div>
          <div class="col-1"><a href="{{ route('usuarios.general') }}"class="btn btn-danger btn-lg">Eliminar</a></div>
        </div>


        <div class="row col-12 p-0 m-0">


            <div class="row col-4  p-0 m-0 ">
                <div class="card">
                    <img src="{{ Storage::url($usuario->avatar) }}" alt="" width="300px">
                </div>

            </div>

            <div class="row col-8  p-0 ps-4 m-0">
              <table class="table table-borderless datatable" id="tablaclientes">
                <thead>
                    <tr>
                        <th scope="col"><h3>Usuario: </h3></th>
                        <td> <h5>{{$usuario->nombre}}  </h5></td>
                    </tr>
                    <tr>
                        <th scope="col"><h3>E-mail: </h3><hr></th>
                        <td> <h5>{{$usuario->email}}  </h5><hr></td>
                    </tr>

                    <tr>
                      <th scope="col"> <h4>Nombre: </h4> </th>
                      <td> <h4>{{$usuario->nombre }}  {{ $usuario->apellido }} </h4></td>
                    </tr>
                    <tr>
                      <th scope="col"><h3>Documento: </h3></th>
                      <td> <h5>{{$usuario->tipo_documento}} : {{ $usuario->documento}} </h5></td>
                    </tr>
                    <tr>
                      <th scope="col"><h3>Genero: </h3></th>
                      <td> <h5>{{$usuario->genero}} </h5></td>
                    </tr>
                    <tr>
                      <th scope="col"><h3>Edad: </h3></th>
                      <td> <h5>{{$usuario->edad}} </h5></td>
                    </tr>
                    <tr>
                      <th scope="col"><h3>Teléfono: </h3></th>
                      <td> <h5>{{$usuario->telefono}} </h5></td>
                    </tr>
                    <tr>
                      <th scope="col"><h3>Ciudad: </h3></th>
                      <td> <h5>{{$usuario->ciudad}} </h5></td>
                    </tr>
                    <tr>
                      <th scope="col"><h3>Dirección: </h3></th>
                      <td> <h5>{{$usuario->direccion}} </h5></td>
                    </tr>

                </thead>
                </table>

            </div>

            <div class="row col-6  p-0 ps-4 m-0">
              <h1></h1>
            </div>


        </div>
      </div>
    </div>
  </main>


  <!-- ======= Footer ======= -->
  @include('Templates.footer')
