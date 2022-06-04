
  <!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->



   <!-- ======= Content  ======= -->
  <main class="col-12 ps-1" style="background-color: #e8edf4;">

    <!-- Tirulos modulos-->
    {{-- <div class="pagetitle ps-4"> <h1>Inicio</h1> </div> --}}

    <section class="section pb-5">
      <div class="row col-12 m-0">

        <!-- ======= Contenedor items ======= -->
        <div class="col-12 pt-4">

          <!-- Separador linea de productos  -->
          {{-- <div class="card-body ps-0">
            <h5 class="card-title pt-3">Opciones del sistema </h5>
            <div id="reportsChart"></div>
          </div> --}}

          <div class="row col-12 m-0 p-0 align-items-center justify-content-center">

            <div class="col-sm-2 bg-white " >
               <div class="card-body">
                  <a class=" nav-link" href="{{ route('clientes_general') }}"><h5 class="card-title">Clientes</h5></a>

                  <div class="d-flex align-items-center">
                    <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class="d-flex align-items-center justify-content-center">
                      <a href="{{ route('clientes_general') }}"><i class="bi bi-people" style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-1">
                      <h6>Cantidad</h6>
                      <span class="text-success small pt-1 fw-bold">{{ $CantidadClientes  }}</span> <span class="text-muted small pt-2 ps-1"> clientes</span>

                    </div>
                  </div>
               </div>
            </div>

            <div class="col-sm-2 bg-white ms-4" >
               <div class="card-body">
                  <a class=" nav-link" href="{{ route('pedidos.general') }}"><h5 class="card-title">Pedidos</h5></a>
                  <div class="d-flex align-items-center">
                    <div  style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                      <a href="{{ route('pedidos.general') }}"><i class="bi bi-clipboard-check" style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-1">
                      <h6>Realizados</h6>
                      <span class="text-success small pt-1 fw-bold">9</span> <span class="text-muted small pt-2 ps-1">pedidos</span>
                    </div>
                  </div>
               </div>
            </div>


            <div class="col-sm-2 bg-white ms-4" >
               <div class="card-body">
                  <a class=" nav-link" href="{{ route('productos.general') }}"><h5 class="card-title">Productos</h5></a>
                  <div class="d-flex align-items-center">
                    <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                      <a href="{{ route('productos.general') }}"><i class="bi bi-cart4" style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-1">
                      <h6>Disponibles</h6>
                      <span class="text-success small pt-1  fw-bold">{{ $CantidadProductos  }}</span> <span class="text-muted small pt-2 ps-1"> Chorizos</span>
                    </div>
                  </div>
               </div>
            </div>


            <div class="col-sm-2 bg-white ms-4" >
               <div class="card-body">
                  <a class=" nav-link" href="{{ route('informes.general') }}"><h5 class="card-title">Informes</h5></a>
                  <div class="d-flex align-items-center">
                    <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                    <a href="{{ route('informes.general') }}"><i class="bi bi-graph-up-arrow " style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-1">
                      <h6>Tipos</h6>


                      <span class="text-success small pt-1 fw-bold">xlxs <i class="bi bi-file-earmark-spreadsheet"></i></span>
                      <span class="text-success small pt-1 fw-bold">pdf <i class="bi bi-file-earmark-pdf"></i></span>
                    </div>
                  </div>
               </div>
            </div>


            <div class="col-sm-2 bg-white ms-4" >
               <div class="card-body">
                  <a class=" nav-link" href="{{ route('usuarios.general') }}"><h5 class="card-title">Usuarios</h5></a>
                  <div class="d-flex align-items-center">
                    <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                      <a href="{{ route('usuarios.general') }}"><i class="bi bi-person-rolodex" style="color: #2eca6a;"></i></a>
                    </div>
                    <div class="ps-1">
                      <h6>Cantidad</h6>
                      <span class="text-success small pt-1 fw-bold">{{ $CantidadUsuarios  }}</span> <span class="text-muted small pt-2 ps-1">operarios</span>
                    </div>
                  </div>
               </div>
            </div>

          </div>
        </div>





        <div class="row col-lg-12 mt-5 m-0 "> <hr>

          <div class="col-lg-6">
            <div class="row col-lg-12 pb-2 align-items-center justify-content-center">
              <!-- Separador linea de productos  -->
              <div class="card-body m-0">
                <h5 class="card-title ps-1">Productos proximos a agotarse </h5>
              </div>

              @foreach ($Productos as $producto )

              <!-- Producto 1 -->
              <div class="col-3 bg-white ">

                <div class="card" style="border: 0px; height: 260px;">

                  <div class="card-head" style="width: 130px; height: 80px;">
                    <img src="{{asset('images/comino.png')}}" class="d-block w-100 pt-2" alt="via1">
                  </div>

                  <div class="card-body">
                    <h5 class="card-title"> {{ $producto->nombre }}</h5>
                    <p class="card-text">Vence el día {{ $producto->fecha_vencimiento }}</p>
                    <a href="#" class="btn btn-primary btn-sm">Verificar</a>
                  </div>
                </div>
              </div>

              @endforeach


            </div>
          </div>

          <div class="col-lg-6">
            <div class="row col-lg-12 pb-2 align-items-center justify-content-center" >
              <!-- Separador linea de productoss -->
              <div class="card-body m-0">
                <h5 class="card-title ps-1">Pedidos poximos a entregar</h5>
              </div>

              <!-- pedido 1 -->
              <div class="col-3 ms-3 bg-white ">

                <div class="card" style="border: 0px; height: 260px;">

                  <div class="card-head" style="width: 130px; height: 80px;">
                    <img src="{{asset('images/comino.png')}}" class="d-block w-100 pt-2" alt="via1">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Pedido 1</h5>
                    <p class="card-text">para: $cliente</p>
                    <a href="#" class="btn btn-primary">Revisar</a>
                  </div>
                </div>
              </div>

              <!-- pedido 2 -->
              <div class="col-3 ms-5 bg-white ">

                <div class="card" style="border: 0px; height: 260px;">

                  <div class="card-head" style="width: 130px; height: 80px;">
                    <img src="{{asset('images/comino.png')}}" class="d-block w-100 pt-2" alt="via1">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">pedido 2</h5>
                    <p class="card-text">para: $cliente</p>
                    <a href="#" class="btn btn-primary">Revisar</a>
                  </div>
                </div>
              </div>

              <!-- pedido 3 -->
              <div class="col-3 ms-5 bg-white ">
                <div class="card" style="border: 0px; height: 260px;">

                  <div class="card-head" style="width: 130px; height: 80px;">
                    <img src="{{asset('images/comino.png')}}" class="d-block w-100 pt-2" alt="via1">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">pedido 3</h5>
                    <p class="card-text">para: $cliente</p>
                    <a href="#" class="btn btn-primary">Revisar</a>
                  </div>
                </div>
              </div>

            </div>

          </div>

        </div><!-- End new Card -->

            <!-- Separador linea de productoss -->
            {{-- <div class="card-body mt-3"> <hr>
              <h5 class="card-title pt-3 ">Proximo</h5>
              <div id="reportsChart"></div>
            </div> --}}

            <!-- seccion Recent Sales -->
            {{-- <div class="col-12 ps-4 pe-5 pb-3">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
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
                  <h5 class="card-title">Recent Sales <span>| Today</span></h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Customer</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#">#2457</a></th>
                        <td>Brandon Jacob</td>
                        <td><a href="#" class="text-primary">At praesentium minu</a></td>
                        <td>$64</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2147</a></th>
                        <td>Bridie Kessler</td>
                        <td><a href="#" class="text-primary">Blanditiis dolor omnis similique</a></td>
                        <td>$47</td>
                        <td><span class="badge bg-warning">Pending</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2049</a></th>
                        <td>Ashleigh Langosh</td>
                        <td><a href="#" class="text-primary">At recusandae consectetur</a></td>
                        <td>$147</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Angus Grady</td>
                        <td><a href="#" class="text-primar">Ut voluptatem id earum et</a></td>
                        <td>$67</td>
                        <td><span class="badge bg-danger">Rejected</span></td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#">#2644</a></th>
                        <td>Raheem Lehner</td>
                        <td><a href="#" class="text-primary">Sunt similique distinctio</a></td>
                        <td>$165</td>
                        <td><span class="badge bg-success">Approved</span></td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Recent Sales --> --}}

            <!-- Separador linea de productos -->
            {{-- <div class="card-body ps-4">
                  <h5 class="card-title pt-4 ">Lista de productos Vencidos</h5>
                  <div id="reportsChart"></div>
            </div> --}}

            <!-- Top Selling -->
            {{-- <div class="col-12 ps-4 pe-5">
              <div class="card top-selling overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                      <h6>Filter</h6>
                    </li>

                    <li><a class="dropdown-item" href="#">Today</a></li>
                    <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li>
                  </ul>
                </div>

                <div class="card-body pb-0">
                  <h5 class="card-title">Top Selling <span>| Today</span></h5>

                  <table class="table table-borderless">
                    <thead>
                      <tr>
                        <th scope="col">Preview</th>
                        <th scope="col">Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Sold</th>
                        <th scope="col">Revenue</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-1.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Ut inventore ipsa voluptas nulla</a></td>
                        <td>$64</td>
                        <td class="fw-bold">124</td>
                        <td>$5,828</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-2.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Exercitationem similique doloremque</a></td>
                        <td>$46</td>
                        <td class="fw-bold">98</td>
                        <td>$4,508</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-3.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Doloribus nisi exercitationem</a></td>
                        <td>$59</td>
                        <td class="fw-bold">74</td>
                        <td>$4,366</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-4.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Officiis quaerat sint rerum error</a></td>
                        <td>$32</td>
                        <td class="fw-bold">63</td>
                        <td>$2,016</td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="#"><img src="assets/img/product-5.jpg" alt=""></a></th>
                        <td><a href="#" class="text-primary fw-bold">Sit unde debitis delectus repellendus</a></td>
                        <td>$79</td>
                        <td class="fw-bold">41</td>
                        <td>$3,239</td>
                      </tr>
                    </tbody>
                  </table>

                </div>

              </div>
            </div><!-- End Top Selling --> --}}



      </div>
    </section>
  </main><!-- End Conten -->


  <!-- ======= Footer ======= -->
  @include('Templates.footer')

