<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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

            <div class="card m-3 ps-5 pe-3 pt-5 pb-3 border border-2">

                <div class="card-body m-0 p-0 mb-1">  <!-- titulo y botones de agregar -->
                    <div class="row col-12 m-0 p-0">
                        <div class="col-10"><h4>Nueva Venta</h4></div>
                        <div class="col-2"><a href="" class="btn btn-primary btn-sm">+ Cliente</a> <a href="" class="btn btn-primary btn-sm">+ Producto</a> </div>
                    </div>
                </div>


                <div class="row col-lg-12 col-sm-12 m-0 p-0">

                    <div class="position-absolute col-lg-5  p-0 ms-1 ps-1 mt-2">
                        <form action="{{ route('pedido_cliente_buscar_datos') }}" method="POST" class="form-control border-0 m-0 p-0">   <!-- Formulario de factura -->
                            @csrf
                            <div class="row col-lg-12 m-0 p-0 border-start border-info ">
                                <div class="form-floating col-lg-9  m-0 p-0 bg-info">
                                    <input type="text" class="form-control border-0 border-buttom" list="datalistOptions" id="exampleDataList" name="NombreCliente"  >
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
                                    <button type="submit" class="btn  btn-info  mt-2 "><i class="bi bi-search"></i>Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <form action="" method="POST" class="form-control border-0 p-2 ">
                        @csrf

                        <div class="row col-lg-12 col-sm-12 m-0 p-0">

                            @if (count($datoscliente) >= 0)
                          @foreach ($datoscliente as $datos)

                        <div class="col-5  mb-3 p-0 pe-2 me-4 bg-danger">
                            <div class="form-floating col-lg-12 border-start border-info m-0 p-0 bg-info">
                                <input type="text" class="form-control border-0 border-buttom bg-white" list="datalistOptions" id="exampleDataList" disabled name="NombreCliente" value="{{ $datos->nombre.' '.$datos->apellido;}}" >
                                <label for="NombreCliente ">Nombre del cliente</label>
                            </div>
                        </div>

                        <div class="form-floating border-start border-info col-lg-2 mb-3 p-0">
                            <input class="form-control bi bi-calendar2-date bg-white border-0" type="date" value="<?php echo date('Y-m-d'); ?>"  id="fecha" disabled/>
                            <label for="fecha">Fecha Emisión</label>
                        </div>

                        <div class="form-floating border-start border-info col-lg-2 mb-3 p-0">
                            <input type="text" class="form-control bg-white border-0" id="floatingInput" value="# 234567" disabled>
                            <label for="floatingInput ">ID Factura</label>
                        </div>

                        <div class="form-floating border-start border-info col-lg-2 mb-3 p-0">
                            <input type="text" class="form-control bg-white border-0" id="floatingInput" value="{{ Auth::user()->name }}" disabled>
                            <label for="floatingInput ">Vendedor</label>
                        </div>

                        <div class="form-floating border-start border-info col-lg-5 mt-2 mb-3 p-0 pe-2">
                            <input class="form-control border-0" type="datetime-local" id="fecha" />
                            <label for="fecha">Fecha y hora de entrega</label>
                        </div>

                        <div class="form-floating border-start border-info col-lg-2 mt-2 mb-3 p-0 ms-4">
                            <input class="form-control bi bi-calendar2-date bg-white border-0" type="text" value=" {{ $datos->direccion;}}"  id="fecha" disabled/>
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

                        @endforeach
                        @endif


                        <div class="card-body m-0 p-0 mt-5">  <!-- titulo de agregar productos -->
                            <div class="row col-12 m-0 p-0 mt-4" >
                                <div class="col-10"><h5>Agregar productos</h5></div>
                            </div>
                        </div>

                        <div class="form-floating col-lg-11 mt-2 mb-3 p-0">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border border-white table-primary">ID</th>
                                        <th scope="col" class="border border-white table-primary">producto</th>
                                        <th scope="col" class="border border-white table-primary">Cantidad</th>
                                        <th scope="col" class="border border-white table-primary">Valor unidad</th>
                                        <th scope="col" class="border border-white table-primary">Total</th>
                                        <th scope="col" class="border border-white table-primary" style="width: 200px;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                              </table>

                            </div>

                            <div class="row col-lg-12">

                                <div class="row col-lg-2 ms-1">
                                    <a href="#" class="btn btn-primary border-info m-1">+Producto</a>
                                    <a href="#" class="btn btn-success border-info m-1">Enviar</a>
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
                                <th scope="col" class="border border-white table-primary" style="width: 250px;">Acciones</th>
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
                                  <td class="border-top">
                                    <div class="row col-12">
                                      <div class="col-3"><a href="{{ route('clientes.show',$clientes->id) }}" type="submit" class="btn btn-primary btn-sm">&nbsp;Ver</a></div>
                                      <div class="col-3 m-0 p-0"><a href="{{ route('clientes.update',$clientes->id) }}" class="btn btn-warning btn-sm">Editar</a></div>
                                      <div class="col-3 m-0 p-0">
                                        <form class="m-0 p-0"  action="{{ route('clientes.destroy',$clientes->id_cliente) }}" method="post">
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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>
</html>
