<head>
    <title>Inver-E / Productos-Detalles</title>
</head>

<!-- ======= Header ======= -->
@include('Templates.nav')
<!-- End Header -->

    <!-- ======= Content  ======= -->
    <main class="col-12 ps-1 pb-3" style="background-color: #e8edf4;">

        <!-- Titulos modulos-->
        <div class="pagetitle ps-4">
            <h1>Productos</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('productos.general') }}">Productos</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('productos.list') }}">Lista Productos</a></li>
                    <li class="breadcrumb-item active">Detalles</li>
                </ol>
            </nav>
        </div>

        <div class="card ms-2 me-3">
            <div class="card-body m-4">

                <div class="row col-12">
                  <div class="col-9"><h4 class="card-title mb-5">Detalles del producto.</h4></div>
                  <div class="col-1"><a href="{{ route('productos.list') }}" class="btn btn-info btn-lg">Atras</a></div>
                  <div class="col-1"><a href="{{ route('productos.update', $producto->id) }}"class="btn btn-warning btn-lg">Editar</a></div>

                  <div class="col-1"><a href="{{ route('productos.destroy', $producto->id) }}"class="btn btn-danger btn-lg">Eliminar</a></div>
                </div>

                <div class="row col-12 p-0 m-0">

                    <div class="row col-4  p-0 m-0 ">
                        <div class="card">
                            <img src="{{ Storage::url($producto->imagen) }}" alt="" width="300px">
                        </div>
                    </div>

                    <div class="row col-8  p-0 ps-4 m-0">
                        <table class="table table-borderless datatable" id="tablaclientes">
                            <thead>
                                <tr>
                                  <th scope="col"> <h4>Nombre: </h4> </th>
                                  <td> <h4>{{$producto->nombre }}  </h4></td>
                                </tr>
                                <tr>
                                  <th scope="col"><h3>Descripcion: </h3></th>
                                  <td> <h5>{{$producto->descripcion}} </h5></td>
                                </tr>

                                <tr>
                                  <th scope="col"><h3>Tipo producto: </h3></th>
                                  <td> <h5>{{$producto->tipo_producto}} </h5></td>
                                </tr>
                                <tr>
                                  <th scope="col"><h3>Calibre: </h3></th>
                                  <td> <h5>{{$producto->calibre_producto}} </h5></td>
                                </tr>
                                <tr>
                                  <th scope="col"><h3>Producto: </h3></th>
                                  <td> <h5>{{$producto->clasificacion_producto}} </h5></td>
                                </tr>
                                <tr>
                                  <th scope="col"><h3>Fecha vencimiento: </h3></th>
                                  <td> <h5>{{$producto->fecha_vencimiento}} </h5></td>
                                </tr>
                                <tr>
                                  <th scope="col"><h3>Estado: </h3></th>
                                  <td> <h5>{{$producto->estado_producto}} </h5></td>
                                </tr>
                                <tr>
                                  <th scope="col"><h3>Peso unidad: </h3></th>
                                  <td> <h5>{{$producto->peso_unitario}} {{$producto->unidad_medida}} </h5></td>
                                </tr>
                                <tr>
                                    <th scope="col"><h3>Valor venta unidad: </h3></th>
                                    <td> <h5>{{$producto->valor_venta}}  </h5></td>
                                </tr>
                                <tr>
                                    <th scope="col"><h3>Valor costo unidad: </h3></th>
                                    <td> <h5>{{$producto->valor_compra}}  </h5></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </main>


  <!-- ======= Footer ======= -->
  @include('Templates.footer')
