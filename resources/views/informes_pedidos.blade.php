<head>
    <title>Inver-E / Informes-Pedidos</title>
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
              <li class="breadcrumb-item active">Pedidos</li>
            </ol>
          </nav>
        </div>

        <!-- ========= Reportes   ========= -->
        <div class="col-12">


            <div class="card-body">

                <div class="row col-12">
                    <div class="col-1"></div>
                    <h5 class="card-title col-8"> <span> </span>    </h5>
                    <a href="#" class="btn btn-success btn-sm col-1 me-1">CSV <i class="bi bi-file-earmark-spreadsheet"></i></a>
                    <a href="{{ route('informe.pdf.pedidos') }}" class="btn btn-danger btn-sm col-1 ms-1">PDF <i class="bi bi-file-earmark-pdf"></i></a>
                    <div class="col-1"></div>
                </div>
                <div class="row col-12 mt-2 mb-5 ms-0 ps-4 pe-4">

                    <div class="col-12 pe-0 ps-0">

                        <!-- seccion tabla de pedidos -->
                        <div class="col-12  bg-info">
                            <div class="card recent-sales overflow-auto border-0">

                                <div class="filter">
                                  <a class="icon " href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                      <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                  </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Lista de pedidos</h5>

                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="border border-white table-primary">ID factura</th>
                                                <th scope="col" class="border border-white table-primary">Cliente</th>
                                                <th scope="col" class="border border-white table-primary">Vendedor</th>
                                                <th scope="col" class="border border-white table-primary">Observaciones</th>
                                                <th scope="col" class="border border-white table-primary">Fecha emisión</th>
                                                <th scope="col" class="border border-white table-primary">Fecha entrega</th>
                                                <th scope="col" class="border border-white table-primary">Total productos</th>
                                                <th scope="col" class="border border-white table-primary">Valor total</th>
                                                <th scope="col" class="border border-white table-primary">acciones</th>
                                              </tr>
                                        </thead>

                                        <tbody>
                                            @if(count($listPedidos)<=0)
                                              <tr>
                                                <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                              </tr>
                                            @else
                                              @foreach ($listPedidos as $pedidos)
                                                <tr>
                                                  <td class="border-top">{{$pedidos->idfactura }}</td>
                                                  <td class="border-top">{{$pedidos->nombrecliente }}</td>
                                                  <td class="border-top">{{$pedidos->vendedor }}</td>
                                                  <td class="border-top">{{$pedidos->descripcion }}</td>
                                                  <td class="border-top">{{$pedidos->fecha_emision }}</td>
                                                  <td class="border-top">{{$pedidos->fecha_entrega }}</td>
                                                  <td class="border-top">{{$pedidos->cantidad }}</td>
                                                  <td class="border-top">{{$pedidos->total }}</td>
                                                  <td class="border-top">

                                                    <a href="#" class="btn btn-primary btn-sm" title="Visualizar datos de la factura"><i class="bi bi-eye"></i>VER</a>
                                                    <a href="#" class="btn btn-success btn-sm" title="Descargar factura del pedido"><i class="bi bi-file-earmark-arrow-down-fill"></i>PDF</a>

                                                  </td>

                                                </tr>
                                              @endforeach
                                            @endif
                                        </tbody>
                                    </table>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main><!-- End Conten -->

    <!-- ======= Footer ======= -->
    @include('Templates.footer')


