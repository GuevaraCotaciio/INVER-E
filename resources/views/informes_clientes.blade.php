<head>
    <title>Inver-E / Informes-Clientes</title>
    <link rel="stylesheet" href="{{ public_path('styles/style_reportes.css') }}" type="text/css">
</head>
    <!-- ======= Header ======= -->
    @include('Templates.nav')
    <!-- End Header -->

    <!-- ======= Contendor Principal  ======= -->
    <main class="col-12 ps-1" style="background-color: #e8edf4;">

        <!-- Tirulos modulos-->
        <div class="pagetitle ps-4">
          <h1>Informes</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('informes.general') }}">Informes</a></li>
              <li class="breadcrumb-item active">Clientes</li>
            </ol>
          </nav>
        </div>

        <!-- ========= Reportes   ========= -->
        <div class="col-12">
            <div class="card">

              <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow" style="">
                  <li class="dropdown-header text-start">
                    <h6>Filter</h6>
                  </li>

                  <li><a class="dropdown-item" href="#">Today</a></li>
                  <li><a class="dropdown-item" href="#">This Month</a></li>
                  <li><a class="dropdown-item" href="#">This Year</a></li>
                </ul>
            </div>

            <div class="card-body">


                <div class="row col-12">
                    <div class="col-1"></div>
                    <h5 class="card-title col-8">* <span> información de clientes </span>    </h5>
                    <a href="#" class="btn btn-success btn-sm col-1 me-1">CSV <i class="bi bi-file-earmark-spreadsheet"></i></a>
                    <a href="{{ route('informe.pdf.clientes') }}" class="btn btn-danger btn-sm col-1 ms-1">PDF <i class="bi bi-file-earmark-pdf"></i></a>
                    <div class="col-1"></div>
                </div>
                <div class="row col-12 mt-2 mb-5 ms-0">
                    <div class="col-1"></div>
                    <div class="col-10 pe-0 ps-0">

                        <div class="table-responsive">
                            <table class="table" id="tablaclientes">
                                <thead>
                                    <tr>
                                      <th scope="col" class="border border-white table-primary">ID</th>
                                      <th scope="col" class="border border-white table-primary">Nombre</th>
                                      <th scope="col" class="border border-white table-primary">Documento</th>
                                      <th scope="col" class="border border-white table-primary">Genero</th>
                                      <th scope="col" class="border border-white table-primary">Edad</th>
                                      <th scope="col" class="border border-white table-primary">Teléfono</th>
                                      <th scope="col" class="border border-white table-primary">Ciudad</th>
                                      <th scope="col" class="border border-white table-primary">Dirección</th>
                                      <th scope="col" class="border border-white table-primary">E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($InfoClientes)<=0)
                                        <tr>
                                        <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                        </tr>
                                    @else
                                        @foreach ($InfoClientes as $infocliente)
                                            <tr>
                                                <td class="border-top">{{$infocliente->id }}</td>
                                                <td class="border-top">{{$infocliente->nombre }} {{$infocliente->apellido }}</td>
                                                <td class="border-top">{{$infocliente->documento }}</td>
                                                <td class="border-top">{{$infocliente->genero }}</td>
                                                <td class="border-top">{{$infocliente->fecha_nacimiento }}</td>
                                                <td class="border-top">{{$infocliente->telefono }}</td>
                                                <td class="border-top">{{$infocliente->ciudad }}</td>
                                                <td class="border-top">{{$infocliente->direccion }}</td>
                                                <td class="border-top">{{$infocliente->email }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><hr>


                <div class="row col-12">
                    <div class="col-1"></div>
                    <h5 class="card-title col-8">* <span> Cantidad pedidos por cliente  </span>    </h5>
                    <a href="#" class="btn btn-success btn-sm col-1 me-1">CSV <i class="bi bi-file-earmark-spreadsheet"></i></a>
                    <a href="#" class="btn btn-danger btn-sm col-1 ms-1">PDF <i class="bi bi-file-earmark-pdf"></i></a>
                    <div class="col-1"></div>
                </div>
                <div class="row col-12 mt-2 mb-5 ms-0">
                    <div class="col-1"></div>
                    <div class="col-10 pe-0 ps-0">

                        <div class="table-responsive">
                            <table class="table" id="tablaclientes">
                                <thead>
                                    <tr>
                                      <th scope="col" class="border border-white table-primary">ID</th>
                                      <th scope="col" class="border border-white table-primary">Nombre</th>
                                      <th scope="col" class="border border-white table-primary">Documento</th>
                                      <th scope="col" class="border border-white table-primary">Genero</th>
                                      <th scope="col" class="border border-white table-primary">Edad</th>
                                      <th scope="col" class="border border-white table-primary">Teléfono</th>
                                      <th scope="col" class="border border-white table-primary">Ciudad</th>
                                      <th scope="col" class="border border-white table-primary">Dirección</th>
                                      <th scope="col" class="border border-white table-primary">E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($PedidosClientes)<=0)
                                        <tr>
                                        <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                        </tr>
                                    @else
                                        @foreach ($PedidosClientes as $Pedidocliente)
                                            <tr>
                                                <td class="border-top">{{$Pedidocliente->id }}</td>
                                                <td class="border-top">{{$Pedidocliente->nombre }} {{$Pedidocliente->apellido }}</td>
                                                <td class="border-top">{{$Pedidocliente->documento }}</td>
                                                <td class="border-top">{{$Pedidocliente->genero }}</td>
                                                <td class="border-top">{{$Pedidocliente->fecha_nacimiento }}</td>
                                                <td class="border-top">{{$Pedidocliente->telefono }}</td>
                                                <td class="border-top">{{$Pedidocliente->ciudad }}</td>
                                                <td class="border-top">{{$Pedidocliente->direccion }}</td>
                                                <td class="border-top">{{$Pedidocliente->email }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><hr>


                <div class="row col-12">
                    <div class="col-1"></div>
                    <h5 class="card-title col-8">* <span> Tipo de producto por cliente </span>    </h5>
                    <a href="#" class="btn btn-success btn-sm col-1 me-1">CSV <i class="bi bi-file-earmark-spreadsheet"></i></a>
                    <a href="#" class="btn btn-danger btn-sm col-1 ms-1">PDF <i class="bi bi-file-earmark-pdf"></i></a>
                    <div class="col-1"></div>
                </div>
                <div class="row col-12 mt-2 mb-5 ms-0">
                    <div class="col-1"></div>
                    <div class="col-10 pe-0 ps-0">

                        <div class="table-responsive">
                            <table class="table" id="tablaclientes">
                                <thead>
                                    <tr>
                                      <th scope="col" class="border border-white table-primary">ID</th>
                                      <th scope="col" class="border border-white table-primary">Nombre</th>
                                      <th scope="col" class="border border-white table-primary">Documento</th>
                                      <th scope="col" class="border border-white table-primary">Genero</th>
                                      <th scope="col" class="border border-white table-primary">Edad</th>
                                      <th scope="col" class="border border-white table-primary">Teléfono</th>
                                      <th scope="col" class="border border-white table-primary">Ciudad</th>
                                      <th scope="col" class="border border-white table-primary">Dirección</th>
                                      <th scope="col" class="border border-white table-primary">E-mail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($ProductoClientes)<=0)
                                        <tr>
                                        <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                        </tr>
                                    @else
                                        @foreach ($ProductoClientes as $productocliente)
                                            <tr>
                                                <td class="border-top">{{$productocliente->id }}</td>
                                                <td class="border-top">{{$productocliente->nombre }} {{$productocliente->apellido }}</td>
                                                <td class="border-top">{{$productocliente->documento }}</td>
                                                <td class="border-top">{{$productocliente->genero }}</td>
                                                <td class="border-top">{{$productocliente->fecha_nacimiento }}</td>
                                                <td class="border-top">{{$productocliente->telefono }}</td>
                                                <td class="border-top">{{$productocliente->ciudad }}</td>
                                                <td class="border-top">{{$productocliente->direccion }}</td>
                                                <td class="border-top">{{$productocliente->email }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><hr>

            </div>

        </div>

    </main><!-- End Conten -->

    <!-- ======= Footer ======= -->
    @include('Templates.footer')


