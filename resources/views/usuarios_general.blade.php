<head>
    <title>Inver-E / Usuarios</title>
</head>

      <!-- ======= Header ======= -->
      @include('Templates.nav')
      <!-- End Header -->


          <!-- ======= Contendor Principal  ======= -->
      <main class="col-12 ps-1" style="background-color: #e8edf4;">

        <!-- Titulos modulos -->
        <div class="pagetitle ps-4">
          <h1>Usuarios</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </nav>
        </div>

        <!-- ========= OPCIONES  ========= -->
        <div class="col-lg-12">

          <div class="card-body"></div>

          <div class="row col-sm-12   align-items-center justify-content-center">

            <div class="col-sm-3 bg-white " >
               <div class="card-body">
                  <a class=" nav-link" href="{{ route('usuarios.create') }}"><h5 class="card-title">Nuevo Usuario</h5></a>

                  <div class="d-flex align-items-center">
                    <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                      <a href="{{ route('usuarios.create') }}"><i class="bi bi-person-plus" style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-2">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>

                    </div>
                  </div>
               </div>
            </div>

            <div class="col-sm-3 bg-white ms-4" >
               <div class="card-body">
                  <a class=" nav-link" href="{{ route('informes.general') }}"><h5 class="card-title">Informe Usuarios</h5></a>
                  <div class="d-flex align-items-center">
                    <div  style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                      <a href="{{ route('informes.general') }}"><i class="bi bi-file-earmark-bar-graph" style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-2">
                      <h6>145</h6>
                      <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                    </div>
                  </div>
               </div>
            </div>

            <div class="col-sm-3 bg-white ms-4" >
               <div class="card-body">
                  <a class=" nav-link" href="#"><h5 class="card-title">--- proximamente</h5></a>
                  <div class="d-flex align-items-center">
                    <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                      <a href="#"><i class="bi bi-cart4" style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-2">
                      <h6></h6>
                      <span class="text-success small pt-1 fw-bold"></span> <span class="text-muted small pt-2 ps-1"></span>
                    </div>
                  </div>
               </div>
            </div>


          </div>
        </div>
        <hr>
        <!-- ========= Contenedor tablas ========= -->
        <section class=" mt-5">
          <div class="row col-lg-12 align-items-center justify-content-center">

            <!-- ========= Titulos y buscador ========= -->
            <div class="row col-lg-12 p-3 align-items-center justify-content-center">
                <div class="row col-12 p-0">

                    <div class="col-7">
                      <div class="row"><h5 class=" pt-2 ps-2">Lista de usuarios </h5></div>
                    </div>

                    <form action="{{ route('usuarios.general')}}" method="GET" class="row col-5 pe-0" >
                      <div class="col-9 ps-1 pt-1 pe-0">
                          <input name="Buscar_usuario" type="text" class="form-control p-2 " id="Buscar_usuario" placeholder="Nombre" >
                      </div>

                      <div class="col-3 ps-1 p-0">
                        <button type="submit" class="btn  btn-info btn-lg"> <i class="bi bi-search"></i> Buscar </button>
                      </div>
                    </form>

                </div>
            </div>


            <!-- ========= Tablas ========= -->
            <div class="row col-lg-12 ps-2 pe-0 pb-3">

                <!-- ========= lista ========= -->
                <div class="col-12 pe-1 pb-3 pe-2">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body pt-5 ps-5 pe-5">

                            @if (session()->has('fine'))
                            <div class="alert alert-success border-2 border-success">{{ session('fine')}}</div>
                            @elseif (session()->has('fail'))
                            <div class="alert alert-danger">{{ session('fail')}}</div>
                            @endif

                            <table class="table table-borderless datatable" id="tablaclientes">
                                <thead>
                                  <tr>
                                    <th scope="col" class="border bg-info">ID</th>
                                    <th scope="col" class="border bg-info">Nombre</th>
                                    <th scope="col" class="border bg-info">Documento</th>
                                    <th scope="col" class="border bg-info">Genero</th>
                                    <th scope="col" class="border bg-info">Edad</th>
                                    <th scope="col" class="border bg-info">Teléfono</th>
                                    <th scope="col" class="border bg-info">Ciudad</th>
                                    <th scope="col" class="border bg-info">Dirección</th>
                                    <th scope="col" class="border bg-info">E-mail</th>
                                    <th scope="col" class="border bg-info" style="width: 250px;">Acciones</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @if(count($listUsuario)<=0)
                                    <tr>
                                      <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                    </tr>
                                  @else
                                    @foreach ($listUsuario as $usuario)
                                      <tr>
                                        <td class="border-top">{{$usuario->id }}</td>
                                        <td class="border-top">{{$usuario->nombre }} {{$usuario->apellido }}</td>
                                        <td class="border-top">{{$usuario->documento }}</td>
                                        <td class="border-top">{{$usuario->genero }}</td>
                                        <td class="border-top">{{$usuario->fecha_nacimiento }}</td>
                                        <td class="border-top">{{$usuario->telefono }}</td>
                                        <td class="border-top">{{$usuario->ciudad }}</td>
                                        <td class="border-top">{{$usuario->direccion }}</td>
                                        <td class="border-top">{{$usuario->email }}</td>
                                        <td class="border-top">
                                          <div class="row col-12">
                                            <div class="col-3"><a href="{{ route('usuarios.show',$usuario->id) }}" type="submit" class="btn btn-primary btn-sm">&nbsp;Ver</a></div>
                                            <div class="col-3 m-0 p-0"><a href="{{ route('usuarios.update',$usuario->id) }}" class="btn btn-warning btn-sm">Editar</a></div>
                                            <div class="col-3 m-0 p-0">
                                              <form class="m-0 p-0"  action="{{ route('usuarios.destroy',$usuario->id) }}" method="post">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Borrar</button>
                                              </form>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>
                                    @endforeach
                                  @endif
                                </tbody>
                            </table>
                            <div class=" row col-12 mt-4">  <!-- paginación -->
                              <div class="col-5"></div>
                              <div class="col-2 ps-5"> {{$listUsuario->links()}}</div>
                              <div class="col-5"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </section>
      </main><!-- End Conten -->

      <!-- ======= Footer ======= -->
      @include('Templates.footer')
