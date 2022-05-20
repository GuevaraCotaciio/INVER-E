<head>
    <title>Inver-E / Productos</title>
</head>

  <!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->


   <!-- ======= Content  ======= -->
    <main class="col-12 ps-1" style="background-color: #e8edf4;">

        <!-- Tirulos modulos-->
        <div class="pagetitle ps-4">
          <h1>Productos</h1>
            <nav>
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Productos</li>
              </ol>
            </nav>
        </div>

        <section class="section dashboard pb-5">
            <div class="row col-12">


                <div class="col-lg-12"> <!-- ========= OPCIONES  ========= -->

                    <div class="row col-sm-12 pt-3  align-items-center justify-content-center">

                        <div class="col-sm-3 bg-white " >
                           <div class="card-body">
                              <a class=" nav-link" href="{{ route('productos.create') }}"><h5 class="card-title">Nuevo Producto</h5></a>

                              <div class="d-flex align-items-center">
                                <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                                  <a href="{{ route('productos.create') }}"><i class="bi bi-person-check" style="color: #2eca6a;"></i></a>
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
                              <a class=" nav-link" href="#"><h5 class="card-title">Informes Productos</h5></a>
                              <div class="d-flex align-items-center">
                                <div  style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                                  <a href="#"><i class="bi bi-clipboard-check" style="color: #2eca6a;"></i></a>
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
                              <a class=" nav-link" href="{{ route('productos.ver') }}"><h5 class="card-title">Todos los productos</h5></a>
                              <div class="d-flex align-items-center">
                                <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                                  <a href="{{ route('productos.ver') }}"><i class="bi bi-cart4" style="color: #2eca6a;"></i></a>
                                </div>
                                <div class="ps-2">
                                  <h6>145</h6>
                                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                                </div>
                              </div>
                           </div>
                        </div>

                    </div>

                </div>


                <div class="col-lg-12 ps-4 pe-1">

                    <div class="card-body ps-0">   <!-- Separador linea de productoss -->
                        <h5 class="card-title pt-4 ">Lista de productos</h5>
                        <div id="reportsChart"></div>
                    </div>


                    <div class="col-12  pb-2">     <!-- productos disponibles -->
                        <div class="card recent-sales overflow-auto">

                            <div class="filter">
                                <a class="ps-2" href="#" data-bs-toggle="dropdown"> <i class="bi bi-three-dots" title="Filtro"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                    <h6>Filtros</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Hoy</a></li>
                                    <li><a class="dropdown-item" href="#">Esta semana</a></li>
                                    <li><a class="dropdown-item" href="#">Este mes</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Productos Disponibles</h5>

                                <table class="table table-borderless datatable" >
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border-bottom border-danger">ID</th>
                                            <th scope="col" class="border-bottom border-danger">Nombre</th>
                                            <th scope="col" class="border-bottom border-danger">Estado</th>
                                            <th scope="col" class="border-bottom border-danger">Calibre</th>
                                            <th scope="col" class="border-bottom border-danger">Clasificación</th>
                                            <th scope="col" class="border-bottom border-danger">Cantidad</th>
                                            <th scope="col" class="border-bottom border-danger">Duración</th>
                                            <th scope="col" class="border-bottom border-danger">Vencimiento</th>
                                            <th scope="col" class="border-bottom border-danger">Peso unitario</th>
                                            <th scope="col" class="border-bottom border-danger">Valor unitario</th>
                                            <th scope="col" class="border-bottom border-danger">Valor comercial</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($ProductosDisponibles)<=0)
                                          <tr>
                                            <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                                          </tr>
                                        @else
                                          @foreach ($ProductosDisponibles as $productoDisp)
                                            <tr scope="row">
                                              <td class="border-bottom">{{$productoDisp->id }}</td>
                                              <td class="border-bottom">{{$productoDisp->nombre }}</td>
                                              <td class="border-bottom">{{$productoDisp->estado_producto }}</td>
                                              <td class="border-bottom">{{$productoDisp->calibre_producto }}</td>
                                              <td class="border-bottom">{{$productoDisp->clasificacion_producto }}</td>
                                              <td class="border-bottom">{{$productoDisp->cantidad }}</td>
                                              <td class="border-bottom">{{$productoDisp->duracion }}</td>
                                              <td class="border-bottom">{{$productoDisp->fecha_vencimiento }}</td>
                                              <td class="border-bottom">{{$productoDisp->peso_unitario }}</td>
                                              <td class="border-bottom">{{$productoDisp->valor_venta }}</td>
                                              <td class="border-bottom">{{$productoDisp->valor_compra }}</td>
                                            </tr >
                                          @endforeach
                                        @endif
                                    </tbody>
                                </table>

                                <div class=" row col-12 mt-3">  <!-- paginación -->
                                    <div class="col-5"></div>
                                    <div class="col-2 ps-5"> {{$ProductosDisponibles->links()}}</div>
                                    <div class="col-5"></div>
                                </div>

                            </div>

                        </div>

                    </div>


                    <div class="col-12 pb-2">          <!-- productos proximos a Vencer -->
                        <div class="card top-selling overflow-auto">

                          <div class="filter">
                            <a class="ps-2" href="#" data-bs-toggle="dropdown"> <i class="bi bi-three-dots" title="Filtro"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                              <li class="dropdown-header text-start">
                                <h6>Filtros</h6>
                              </li>

                              <li><a class="dropdown-item" href="#">Hoy</a></li>
                              <li><a class="dropdown-item" href="#">Esta semana</a></li>
                              <li><a class="dropdown-item" href="#">Este mes</a></li>
                            </ul>
                          </div>

                          <div class="card-body pb-0">
                            <h5 class="card-title">Productos proximos a vencer</h5>

                            <table class="table table-borderless">
                              <thead>
                                  <tr>
                                      <th scope="col" class="border-bottom border-danger">ID</th>
                                      <th scope="col" class="border-bottom border-danger">Nombre</th>
                                      <th scope="col" class="border-bottom border-danger">Estado</th>
                                      <th scope="col" class="border-bottom border-danger">Calibre</th>
                                      <th scope="col" class="border-bottom border-danger">Clasificación</th>
                                      <th scope="col" class="border-bottom border-danger">Cantidad</th>
                                      <th scope="col" class="border-bottom border-danger">Duración</th>
                                      <th scope="col" class="border-bottom border-danger">Vencimiento</th>
                                      <th scope="col" class="border-bottom border-danger">Peso unitario</th>
                                      <th scope="col" class="border-bottom border-danger">Valor unitario</th>
                                      <th scope="col" class="border-bottom border-danger">Valor comercial</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @if(count($ProductosPorVencer)<=0)
                                    <tr>
                                      <td colspan="10" class="text-danger"> No hay registros para mostrar</td>
                                    </tr>
                                  @else
                                    @foreach ($ProductosPorVencer as $productoVencer)
                                      <tr>
                                        <td class="border-bottom">{{$productoVencer->id }}</td>
                                        <td class="border-bottom">{{$productoVencer->nombre }}</td>
                                        <td class="border-bottom">{{$productoVencer->estado_producto }}</td>
                                        <td class="border-bottom">{{$productoVencer->calibre_producto }}</td>
                                        <td class="border-bottom">{{$productoVencer->clasificacion_producto }}</td>
                                        <td class="border-bottom">{{$productoVencer->cantidad }}</td>
                                        <td class="border-bottom">{{$productoVencer->duracion }}</td>
                                        <td class="border-bottom">{{$productoVencer->fecha_vencimiento }}</td>
                                        <td class="border-bottom">{{$productoVencer->peso_unitario }}</td>
                                        <td class="border-bottom">{{$productoVencer->valor_venta }}</td>
                                        <td class="border-bottom">{{$productoVencer->valor_compra }}</td>
                                      </tr>
                                    @endforeach
                                  @endif
                              </tbody>
                            </table>

                            <div class=" row col-12 mt-3">  <!-- paginación -->
                              <div class="col-5"></div>
                              <div class="col-2 ps-5"> {{$ProductosVencidos->links()}}</div>
                              <div class="col-5"></div>
                            </div>

                          </div>

                        </div>
                    </div>


                    <div class="col-12 ">          <!-- productos Vencidos -->
                      <div class="card top-selling overflow-auto">

                        <div class="filter">
                          <a class="ps-2" href="#" data-bs-toggle="dropdown"> <i class="bi bi-three-dots" title="Filtro"></i></a>
                          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <li class="dropdown-header text-start">
                              <h6>Filtros</h6>
                            </li>

                            <li><a class="dropdown-item" href="#">Hoy</a></li>
                            <li><a class="dropdown-item" href="#">Esta semana</a></li>
                            <li><a class="dropdown-item" href="#">Este mes</a></li>
                          </ul>
                        </div>

                        <div class="card-body pb-0">
                          <h5 class="card-title">Productos Vencidos</h5>

                          <table class="table table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col" class="border-bottom border-danger">ID</th>
                                    <th scope="col" class="border-bottom border-danger">Nombre</th>
                                    <th scope="col" class="border-bottom border-danger">Estado</th>
                                    <th scope="col" class="border-bottom border-danger">Calibre</th>
                                    <th scope="col" class="border-bottom border-danger">Clasificación</th>
                                    <th scope="col" class="border-bottom border-danger">Cantidad</th>
                                    <th scope="col" class="border-bottom border-danger">Duración</th>
                                    <th scope="col" class="border-bottom border-danger">Vencimiento</th>
                                    <th scope="col" class="border-bottom border-danger">Peso unitario</th>
                                    <th scope="col" class="border-bottom border-danger">Valor unitario</th>
                                    <th scope="col" class="border-bottom border-danger">Valor comercial</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($ProductosVencidos)<=0)
                                  <tr>
                                    <td colspan="10" class="text-danger"> No hay registros para mostrar</td>
                                  </tr>
                                @else
                                  @foreach ($ProductosVencidos as $productoVenc)
                                    <tr>
                                      <td class="border-bottom">{{$productoVenc->id }}</td>
                                      <td class="border-bottom">{{$productoVenc->nombre }}</td>
                                      <td class="border-bottom">{{$productoVenc->estado_producto }}</td>
                                      <td class="border-bottom">{{$productoVenc->calibre_producto }}</td>
                                      <td class="border-bottom">{{$productoVenc->clasificacion_producto }}</td>
                                      <td class="border-bottom">{{$productoVenc->cantidad }}</td>
                                      <td class="border-bottom">{{$productoVenc->duracion }}</td>
                                      <td class="border-bottom">{{$productoVenc->fecha_vencimiento }}</td>
                                      <td class="border-bottom">{{$productoVenc->peso_unitario }}</td>
                                      <td class="border-bottom">{{$productoVenc->valor_venta }}</td>
                                      <td class="border-bottom">{{$productoVenc->valor_compra }}</td>
                                    </tr>
                                  @endforeach
                                @endif
                            </tbody>
                          </table>

                          <div class=" row col-12 mt-3">  <!-- paginación -->
                            <div class="col-5"></div>
                            <div class="col-2 ps-5"> {{$ProductosVencidos->links()}}</div>
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
