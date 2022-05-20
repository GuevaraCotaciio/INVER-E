<head>
    <title>Inver-E / Productos-crear</title>
</head>
    <!-- ======= Header ======= -->
    @include('Templates.nav')
    <!-- End Header -->

        <!-- ======= Content  ======= -->
        <main class="col-lg-12" style="background-color: #e8edf4;">

            <!-- Tirulos modulos-->
            <div class="pagetitle ps-4">
              <h1>Productos</h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('productos.general') }}">Productos</a></li>
                    <li class="breadcrumb-item active">ver</li>
                  </ol>
                </nav>
            </div>

            <section class="section dashboard mt-4 pb-5">
                <div class="col-lg-12 p-4">

                    <div class=" bg-white row col-lg-12 pt-3 pb-3 m-0">      {{--  contenedor de items  --}}
                        @foreach ($productosproducidos as $productos )
                            <div class="card ms-2 border border-info" style="border: 0px;  width: 190px;">

                                <div class="row ps-3 ">
                                    <div class="card-head pt-1 m-0 " style="width: 160px; height: 90px;">
                                        <img src="{{asset('images/comino.png')}}" class="d-block w-100" alt="via1">
                                    </div>
                                    <span class="btn col-5" title="Cantidad de productos"><i class="bi bi-list-ol"></i> {{ $productos->cantidad }}</span>
                                    <span class="btn col-7" title="Valor unitario del producto"><i class="bi bi-currency-dollar"></i> {{ $productos->valor_venta }}</span>
                                </div>

                                <div class="card-body m-0 p-0 ps-2 mb-1 border-top">
                                    <h5 class="card-title">{{ $productos->nombre }}</h5>
                                    <p class="card-text mb-1" style=" height: 100px;">{{ $productos->descripcion }}</p>

                                    <a class="btn btn-info" title="Detalles del producto" name="ver"><i class="bi bi-check-all"></i></a>  {{-- ver --}}
                                    <a class="btn btn-warning" title="Editar información del producto" name="editar"><i class="bi bi-pencil-square"></i></a>  {{-- editar --}}
                                    <a class="btn btn-danger" title="Eliminar producto" name="eliminar"><i class="bi bi-trash"></i></a>  {{-- eliminar --}}

                                </div>
                            </div>
                        @endforeach
                    </div>



                </div>
            </section>
        </main><!-- End Conten -->

    <!-- ======= Footer ======= -->
    @include('Templates.footer')
