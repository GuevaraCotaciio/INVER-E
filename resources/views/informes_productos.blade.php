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
                    <h5 class="card-title col-8">* <span> Cantidad de productos Disponibles  </span>    </h5>
                    <a href="#" class="btn btn-success btn-sm col-1 me-1">CSV <i class="bi bi-file-earmark-spreadsheet"></i></a>
                    <a href="{{ route('informe.pdf.productosdisponibles') }}" class="btn btn-danger btn-sm col-1 ms-1">PDF <i class="bi bi-file-earmark-pdf"></i></a>
                    <div class="col-1"></div>
                </div>
                <div class="row col-12 mt-2 mb-5 ms-0">
                    <div class="col-1"></div>
                    <div class="col-10 pe-0 ps-0">

                        <div class="table-responsive">
                            <table class="table" id="tablaclientes">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border border-white table-primary">Nombre</th>
                                        <th scope="col" class="border border-white table-primary">Descripción</th>
                                        <th scope="col" class="border border-white table-primary">Proveedor</th>
                                        <th scope="col" class="border border-white table-primary">Tipo</th>
                                        <th scope="col" class="border border-white table-primary">Estado</th>
                                        <th scope="col" class="border border-white table-primary">Caducidad</th>
                                        <th scope="col" class="border border-white table-primary">Cantidad</th>
                                        <th scope="col" class="border border-white table-primary">Valor</th>
                                        <th scope="col" class="border border-white table-primary">Total </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($ProductosAlmacenados)<=0)
                                        <tr>
                                        <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                        </tr>
                                    @else
                                        @foreach ($ProductosAlmacenados as $producto)
                                            <tr>
                                                <td class="border-top">{{$producto->nombre }}</td>
                                                <td class="border-top">{{$producto->descripcion }}</td>
                                                <td class="border-top">{{$producto->nombreproveedor }}</td>
                                                <td class="border-top">{{$producto->clasificacion_producto }}</td>
                                                <td class="border-top">{{$producto->estado_producto }}</td>
                                                <td class="border-top">{{$producto->fecha_vencimiento }}</td>
                                                <td class="border-top">{{$producto->cantidad }}</td>
                                                <td class="border-top">{{$producto->valor_venta }}</td>
                                                <td class="border-top">{{$producto->valor_venta * $producto->cantidad }}</td>
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
                    <h5 class="card-title col-8">* <span> Lista productos vencidos </span>    </h5>
                    <a href="#" class="btn btn-success btn-sm col-1 me-1">CSV <i class="bi bi-file-earmark-spreadsheet"></i></a>
                    <a href="{{ route('informe.pdf.productosvencidos') }}" class="btn btn-danger btn-sm col-1 ms-1">PDF <i class="bi bi-file-earmark-pdf"></i></a>
                    <div class="col-1"></div>
                </div>
                <div class="row col-12 mt-2 mb-5 ms-0">
                    <div class="col-1"></div>
                    <div class="col-10 pe-0 ps-0">

                        <div class="table-responsive">
                            <table class="table" id="tablaclientes">
                                <thead class="cabecera">
                                    <tr>
                                      <th scope="col" class="border border-white table-primary">Nombre</th>
                                      <th scope="col" class="border border-white table-primary">Descripción</th>
                                      <th scope="col" class="border border-white table-primary">Proveedor</th>
                                      <th scope="col" class="border border-white table-primary">Tipo</th>
                                      <th scope="col" class="border border-white table-primary">Estado</th>
                                      <th scope="col" class="border border-white table-primary">Caduco</th>
                                      <th scope="col" class="border border-white table-primary">Cantidad</th>
                                      <th scope="col" class="border border-white table-primary">Valor</th>
                                      <th scope="col" class="border border-white table-primary">Total </th>
                                    </tr>
                                </thead>
                                <tbody class="cuerpo">
                                    @if(count($productosVencidos)<=0)
                                      <tr>
                                        <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                      </tr>
                                    @else
                                      @foreach ($productosVencidos as $productos)
                                        <tr>
                                          <td class="border-top">{{$productos->nombre }}</td>
                                          <td class="border-top">{{$productos->descripcion }}</td>
                                          <td class="border-top">{{$productos->nombreproveedor }}</td>
                                          <td class="border-top">{{$productos->clasificacion_producto }}</td>
                                          <td class="border-top">{{$productos->estado_producto }}</td>
                                          <td class="border-top">{{$productos->fecha_vencimiento }}</td>
                                          <td class="border-top">{{$productos->cantidad }}</td>
                                          <td class="border-top">{{$productos->valor_venta }}</td>
                                          <td class="border-top">{{$productos->valor_venta * $productos->cantidad }}</td>
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


