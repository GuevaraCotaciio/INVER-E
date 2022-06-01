<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="{{asset('styles\event.js')}}"></script>  {{-- scrip de nuevo item --}}

    <title>Inver-E / Pedidos</title>
</head>
<body>

  <!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->


  <main class="col-12" style="background-color: #e8edf4; ">

    <!-- Tirulos modulos-->
    <div class="pagetitle ps-4 ">
      <h1>Pedidos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Pedidos</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard pb-4 p-0 ps-0">

        <!-- ======= Formulario de nuevas ventas ======= -->
        <div class="col-lg-12">
            <div class="card m-3 ps-5 pe-3 pt-5 border border-2">
                <div class="card-body m-0 p-0 mb-1">  <!-- titulo y botones de agregar -->
                    <div class="row col-12 m-0 p-0">
                        <div class="col-9"><h4>Nueva Venta</h4></div>
                        <div class="col-3 "> <a href="" class="btn btn-primary btn-sm">+ Cliente</a> <a href="" class="btn btn-primary btn-sm">+ Producto</a> </div>
                    </div>
                </div>

                <div class="row col-lg-12 col-sm-12 m-0 p-0 mb-5 pb-2">
                    <div class="position-absolute col-lg-5  p-0 ms-1 ps-1 mt-2">

                        <form action="{{ route('pedido_cliente_buscar_datos') }}" method="POST" class="form-control border-0 m-0 p-0">   <!-- Formulario busqueda cliente -->
                            @csrf

                            <div class="row col-lg-12 m-0 p-0 border-start border-info ">
                                <div class="form-floating col-lg-9  m-0 p-0">
                                    <input type="text" class="form-control border-0 border-buttom" list="datalistOptions" id="exampleDataList" name="NombreCliente" title="Selecciona un cliente" required>
                                    <label for="NombreCliente ">* Cliente</label>

                                    @if (count($nombreclientes))
                                    <datalist id="datalistOptions">
                                        @foreach ($nombreclientes as $nombres)
                                            <option value="{{$nombres->id_cliente . ' - '.$nombres->nombre.' '.$nombres->apellido}}">
                                        @endforeach
                                    </datalist>
                                    @endif

                                </div>
                                <div class="border-info col-lg-2 m-0 p-0 ms-2">
                                    <button type="submit" class="btn border-info mt-2 "><i class="bi bi-search"></i></button>
                                </div>
                            </div>

                        </form>

                    </div>

                    <form action="{{ route('pedidos.save') }}" method="POST" class="form-control border-0 p-2 ">   <!-- Formulario guardar pedidos de clientes -->
                        @csrf

                        <div class="row col-lg-12 col-sm-12 m-0 p-0 ">

                            @if (count($datoscliente) >= 0)
                            @foreach ($datoscliente as $datos)

                            <input type="text" name="idUsuario" value="{{ $datos->id_cliente}}" hidden>

                            <div class="col-5  mb-3 p-0 pe-2 me-4">
                                <div class="form-floating col-lg-12 border-start border-info m-0 p-0 bg-info">
                                    <input type="text" class="form-control border-0 border-buttom bg-white" list="datalistOptions" id="exampleDataList" readonly="readonly" name="NombreCliente" value="{{$datos->nombre.' '.$datos->apellido;}}" >
                                    <label for="NombreCliente ">Nombre del cliente</label>
                                </div>
                            </div>

                            <div class="form-floating border-start border-info col-lg-2 mb-3 p-0">
                                <input class="form-control bi bi-calendar2-date bg-white border-0" type="date" value="<?php echo date('Y-m-d'); ?>"  id="fecha" readonly="readonly" />
                                <label for="fecha">Fecha Emisión</label>
                            </div>

                            <div class="form-floating border-start border-info col-lg-2 mb-3 p-0">
                                <input type="text" class="form-control bg-white border-0" id="floatingInput" name="id_factura" value="234567" readonly="readonly">
                                <label for="floatingInput ">ID Factura</label>
                            </div>


                            <div class="form-floating border-start border-info col-lg-2 mb-3 p-0">
                                <input type="text" class="form-control bg-white border-0" name="nombre_vendedor" id="floatingInput" value="{{ Auth::user()->name }}" readonly="readonly">
                                <label for="floatingInput ">Vendedor</label>
                            </div>

                            <div class="form-floating border-start border-info col-lg-5 mt-2 mb-3 p-0 pe-2">
                                <input class="form-control border-0" type="datetime-local" id="fecha" />
                                <label for="fecha">Fecha y hora de entrega</label>
                            </div>

                            <div class="form-floating border-start border-info col-lg-2 mt-2 mb-3 p-0 ms-4">
                                <input class="form-control bi bi-calendar2-date bg-white border-0" type="text" value=" {{ $datos->direccion;}}"  id="fecha" readonly="readonly"/>
                                <label for="fecha">Dirección</label>
                            </div>

                            <div class="form-floating border-start border-info col-lg-2 mt-2 mb-3 p-0">
                                <input type="text" class="form-control bg-white border-0" id="floatingInput" value="{{ $datos->telefono;}}" disabled>
                                <label for="floatingInput ">Teléfono</label>
                            </div>

                            <div class="form-floating border-start border-info col-lg-2 mt-2 mb-3 p-0">
                                <input type="text" class="form-control bg-white border-0" id="floatingInput" value=" 18-03-2022" disabled>
                                <label for="floatingInput ">Ultimo pedido</label>
                            </div>

                            <div class="form-floating border-start border-info col-lg-11 mt-4 mb-3 p-0">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Observaciones</label>
                            </div>

                            <div class="card-body m-0 p-0 mt-3">  <!-- titulo de agregar productos -->
                                <div class="row col-12 m-0 p-0 " >
                                    <div class="col-10 ms-0 ps-0"><h5>Agregar productos</h5></div>
                                </div>
                            </div>

                            <div class="form-floating col-lg-11 mt-2 p-0">   <!-- tabla de productos -->
                                <div class="table-responsive">
                                  <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="border border-white table-primary" style="width: 100px;">ID</th>
                                            <th scope="col" class="border border-white table-primary" style="width: 350px;">producto</th>
                                            <th scope="col" class="border border-white table-primary" style="width: 200px;">Cantidad</th>
                                            <th scope="col" class="border border-white table-primary" style="width: 150px;">Valor unidad</th>
                                            <th scope="col" class="border border-white table-primary" style="width: 250px;">Total</th>
                                            <th scope="col" class="border border-white table-primary" style="width: 200px;">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-light">


                                        @if (count($listaitem) > 0)       {{--   condicion cuando ya ha guardado un pedido y devulve datos  --}}


                                        @foreach ($listaitem as $items )
                                        <tr  id="fila{{$items->id}}">
                                            <td  class="border-buttom border-info"># <input type="number" class=" border-0 mt-2 col-9 p-0 bg-light" name="id_producto{{$items->id}}"     value="{{ $items->id_producto }}"  title="Identificador del producto" readonly="readonly"> </td>   {{-- id --}}
                                            <td  class="border-buttom border-info"><input type="text" class="form-control border bg-light" name="Nombreproduct{{$items->id}}"     value="{{ $items->nombre_producto }}" title="Nombre del producto" readonly="readonly"> </td>
                                            <td class="border-buttom border-info "><input type="number" class="form-control border bg-light" name="Cantidad{{$items->id}}"      value="{{ $items->cantidad }}" title="Ingresa una cantidad" readonly="readonly"></td>    {{-- Cantidad --}}
                                            <td class="border-buttom border-info ">$ <input type="text" class="border-0 mt-2 col-9 p-0 bg-light" name="ValorUnitario{{$items->id}}"      value="{{ $items->valor }}"  title="Valor por unidad del producto" readonly="readonly"></td> {{-- valor --}}
                                            <td class="border-buttom border-info ">$ <input type="text" class="border-0 mt-2 col-9 p-0 bg-light" name="Total{{$items->id}}"      value="{{ $items->valor * $items->cantidad }}"   title="total de la cantidad por el valor del producto" readonly="readonly"></td>  {{-- total --}}
                                            <td class="border-buttom border-info "><a class="btn btn-sm btn-danger me-1">Eliminar</a><a class="btn btn-sm btn-warning">Editar</a> </td>    {{-- acciones --}}
                                        </tr>
                                        @endforeach


                                        <tr  id="fila1">

                                            <td  class="border-buttom border-info">#<input type="number" class=" border-0 mt-2 col-9 p-0 bg-light " value="" name="id_producto" title="Identificador del producto" disabled> </td>   {{-- id --}}
                                            <td  class="border-buttom border-info">
                                                <input type="text" class="form-control border bg-light" list="datalistOptions" id="exampleDataList" name="nombre_producto" title="Selecciona un producto">  {{-- producto --}}

                                                <datalist id="datalistOptions">
                                                    @foreach ($listaProdctos as $productos)
                                                        <option value="{{$productos->idproducto . ' - ' .$productos->nombre}}">
                                                    @endforeach
                                                </datalist>

                                            </td>
                                            <td class="border-buttom border-info "><input type="number" class="form-control border bg-light" name="cantidad_producto" title="Ingresa una cantidad" ></td>    {{-- Cantidad --}}
                                            <td class="border-buttom border-info ">$<input type="text" class="border-0 mt-2 col-9 p-0 bg-light" name="ValorUnitario" title="Valor por unidad del producto" readonly="readonly"></td> {{-- valor --}}
                                            <td class="border-buttom border-info ">$ =<input type="text" class="border-0 mt-2 col-9 p-0 bg-light" value="" name="Total" title="total de la cantidad por el valor del producto" readonly="readonly"></td>  {{-- total --}}
                                            <td class="border-buttom border-info "><a class="btn btn-sm btn-danger me-1">Eliminar</a><a class="btn btn-sm btn-warning">Editar</a> </td>    {{-- acciones --}}
                                        </tr>



                                         @else   {{--  condicion cuando recien entra a realizar un pedido --}}

                                        <tr id="fila0">

                                            <td class="border-buttom border-info">#<input type="number" class=" border-0 mt-2 col-9 p-0 bg-light " value="" name="id_producto" title="Identificador del producto" disabled></td>   {{-- id --}}
                                            <td class="border-buttom border-info">
                                                <input type="text" class="form-control border bg-light" list="datalistOptions" id="exampleDataList" name="nombre_producto" title="Selecciona un producto" required>  {{-- producto --}}

                                                <datalist id="datalistOptions">
                                                    @foreach ($listaProdctos as $productos)
                                                        <option value="{{$productos->idproducto . ' - ' .$productos->nombre}}">
                                                    @endforeach
                                                </datalist>

                                            </td>
                                            <td class="border-buttom border-info "><input type="number" class="form-control border bg-light" name="cantidad_producto" title="Ingresa una cantidad" required></td>    {{-- Cantidad --}}
                                            <td class="border-buttom border-info ">$<input type="text" class="border-0 mt-2 col-9 p-0 bg-light" name="ValorUnitario" title="Valor por unidad del producto" readonly="readonly"></td> {{-- valor --}}
                                            <td class="border-buttom border-info ">$ =<input type="text" class="border-0 mt-2 col-9 p-0 bg-light" name="Total" title="total de la cantidad por el valor del producto" readonly="readonly"></td>  {{-- total --}}
                                            <td class="border-buttom border-info "><a class="btn btn-sm btn-danger me-1">Eliminar</a><a class="btn btn-sm btn-warning">Editar</a> </td>    {{-- acciones --}}
                                        </tr>

                                        @endif



                                    </tbody>
                                  </table>
                                </div>


                                <div class="row col-lg-12">   <!-- botones -->
                                    <div class="row col-lg-2 ms-1 " id="caja">
                                        <button type="submit" class="btn btn-primary border-info m-1" name="GuardarProducto" value="nuevoitem">+Producto</button>
                                        <button type="submit" class="btn btn-success border-info m-1" name="GuardarFactura" value="crearfactura">Enviar</button>
                                    </div>
                                    <div class=" row col-lg-10">
                                        <div class="col-lg-7"></div>
                                        <div class="col-lg-5 ps-0">
                                            <div class="row ps-0">
                                                <h4>TOTAL:  <span> $58.200</span></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            @endforeach
                            @endif

                        </div>
                    </form>

                </div>
            </div>
        </div>



        <!-- ======= Contenedor items ======= -->
        <div class="col-lg-12 pt-2">
            <div class="row col-12 ps-4">

                <!-- seccion tabla de clientes -->
                <div class="col-12 pe-5 pb-3">
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
                      <h5 class="card-title">Lista de clientes</h5>

                      <table class="table">
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
                            @if(count($listClientes)<=0)
                              <tr>
                                <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                              </tr>
                            @else
                              @foreach ($listClientes as $clientes)
                                <tr>
                                  <td class="border-top">{{$clientes->id_cliente }}</td>
                                  <td class="border-top">{{$clientes->nombre }} {{$clientes->apellido }}</td>
                                  <td class="border-top">{{$clientes->documento }}</td>
                                  <td class="border-top">{{$clientes->genero }}</td>
                                  {{-- <td class="border-top">{{ $edad =floor(date('Y-m-d')/ ($clientes->fecha_nacimiento) ) }}</td> --}}
                                  <td class="border-top">{{$clientes->fecha_nacimiento }}</td>
                                  <td class="border-top">{{$clientes->telefono }}</td>
                                  <td class="border-top">{{$clientes->ciudad }}</td>
                                  <td class="border-top">{{$clientes->direccion }}</td>
                                  <td class="border-top">{{$clientes->email }}</td>

                                </tr>
                              @endforeach
                            @endif
                        </tbody>
                      </table>

                    </div>

                  </div>
                </div><!-- End Recent Sales -->






                <!-- Separador linea de productos  -->
                {{-- <div class="card-body">
                  <h5 class="card-title pt-3 ps-2">Productos proximos a vencer </h5>
                    <div id="reportsChart"></div>
                </div> --}}


                {{-- <!-- Sales Card -->
                <div class="col-lg-3 col-md-4">

                  <div class="card" style="width: 18rem; border: 0px;">

                    <div id="carouselControls1" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active"style="width: 13rem;">
                          <img src="{{asset('images/facebook.png')}}" class="d-block w-100 ps-5 pt-2" alt="via1">
                        </div>
                        <div class="carousel-item " style="width: 13rem;">
                          <img src="{{asset('images/instagram.png')}}" class="d-block w-100 ps-5 pt-2" alt="via2">
                        </div>
                        <div class="carousel-item" style="width: 13rem;">
                          <img src="{{asset('images/whatsapp.png')}}" class="d-block w-100 ps-5 pt-2" alt="via3">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls1" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselControls1" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Redes Sociales1</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Revisar Producto</a>
                    </div>
                  </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-lg-3 col-md-4">

                  <div class="card" style="width: 18rem;  border: 0px;">

                    <div id="carouselControls2" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active"style="width: 13rem;">
                          <img src="{{asset('images/facebook.png')}}" class="d-block w-100 ps-5 pt-2" alt="via1">
                        </div>
                        <div class="carousel-item " style="width: 13rem;">
                          <img src="{{asset('images/instagram.png')}}" class="d-block w-100 ps-5 pt-2" alt="via2">
                        </div>
                        <div class="carousel-item" style="width: 13rem;">
                          <img src="{{asset('images/whatsapp.png')}}" class="d-block w-100 ps-5 pt-2" alt="via3">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselControls2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Redes Sociales2</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Revisar Producto</a>
                    </div>
                  </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-lg-3 col-md-4">

                  <div class="card" style="width: 18rem;  border: 0px;">

                    <div id="carouselControls3" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active"style="width: 13rem;">
                          <img src="{{asset('images/facebook.png')}}" class="d-block w-100 ps-5 pt-2" alt="via1">
                        </div>
                        <div class="carousel-item " style="width: 13rem;">
                          <img src="{{asset('images/instagram.png')}}" class="d-block w-100 ps-5 pt-2" alt="via2">
                        </div>
                        <div class="carousel-item" style="width: 13rem;">
                          <img src="{{asset('images/whatsapp.png')}}" class="d-block w-100 ps-5 pt-2" alt="via3">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls3" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselControls3" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Redes Sociales3</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Revisar Producto</a>
                    </div>
                  </div>
                </div><!-- End Customers Card -->

                <!-- new Card -->
                <div class="col-lg-3 col-md-4">

                  <div class="card" style="width: 18rem;  border: 0px;">

                    <div id="carouselControls4" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active"style="width: 13rem;">
                          <img src="{{asset('images/facebook.png')}}" class="d-block w-100 ps-5 pt-2" alt="via1">
                        </div>
                        <div class="carousel-item " style="width: 13rem;">
                          <img src="{{asset('images/instagram.png')}}" class="d-block w-100 ps-5 pt-2" alt="via2">
                        </div>
                        <div class="carousel-item" style="width: 13rem;">
                          <img src="{{asset('images/whatsapp.png')}}" class="d-block w-100 ps-5 pt-2" alt="via3">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselControls4" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselControls4" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">Redes Sociales4</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Revisar Producto</a>
                    </div>
                  </div>
                </div><!-- End new Card --> --}}


            </div>
        </div><!-- End contenedor items -->


    </section>
  </main><!-- End Conten -->


  <!-- ======= Footer ======= -->
  @include('Templates.footer')


  <!-- links JS Bootstrap -->

</body>
</html>
