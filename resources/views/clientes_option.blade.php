  <!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->

   <!-- ======= Content  ======= -->
  <main class="col-12 ps-1 pb-3" style="background-color: #e8edf4;">

    <!-- Tirulos modulos-->
    <div class="pagetitle ps-4">
      <h1>Clientes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('clientes_general') }}">Clientes</a></li>
          <li class="breadcrumb-item active">Información</li>
        </ol>
      </nav>
    </div>

    <div class="card ms-2 me-3">
      <div class="card-body m-4">

        <div class="row col-12">
          <div class="col-9"><h4 class="card-title mb-5">Datos Personales.</h4></div>
          <div class="col-1"><a href="{{ route('clientes_general') }}" class="btn btn-info btn-lg">Atras</a></div>
          <div class="col-1"><a href="{{ route('clientes.update',$cliente->id) }}"class="btn btn-warning btn-lg">Editar</a></div>
          <div class="col-1"><a href="{{ route('clientes_general') }}"class="btn btn-danger btn-lg">Eliminar</a></div>
        </div>


        <div class="row col-12 p-0 m-0">



            <div class="row col-4  p-0 m-0 ">
                <div class="card">
                    <img src="{{ Storage::url($cliente->avatar) }}" alt="" width="150px">
                </div>

            </div>

            <div class="row col-8  p-0 ps-4 m-0">

                <table class="table table-borderless datatable" id="tablaclientes">
                    <thead>
                        <tr>
                          <th scope="col"> <h4>Nombre: </h4> </th>
                          <td> <h4>{{$cliente->nombre }}  {{ $cliente->apellido }} </h4></td>
                        </tr>
                        <tr>
                          <th scope="col"><h3>Documento: </h3></th>
                          <td> <h5>{{$cliente->tipo_documento}} : {{ $cliente->documento}} </h5></td>
                        </tr>

                        <tr>
                          <th scope="col"><h3>Genero: </h3></th>
                          <td> <h5>{{$cliente->genero}} </h5></td>
                        </tr>
                        <tr>
                          <th scope="col"><h3>Edad: </h3></th>
                          <td> <h5>{{$cliente->edad}} </h5></td>
                        </tr>
                        <tr>
                          <th scope="col"><h3>Teléfono: </h3></th>
                          <td> <h5>{{$cliente->telefono}} </h5></td>
                        </tr>
                        <tr>
                          <th scope="col"><h3>Ciudad: </h3></th>
                          <td> <h5>{{$cliente->ciudad}} </h5></td>
                        </tr>
                        <tr>
                          <th scope="col"><h3>Dirección: </h3></th>
                          <td> <h5>{{$cliente->direccion}} </h5></td>
                        </tr>
                        <tr>
                          <th scope="col"><h3>E-mail: </h3></th>
                          <td> <h5>{{$cliente->email}}  </h5></td>
                        </tr>
                    </thead>
                </table>

            </div>


        </div>

        <!-- ======== Formulario General ======== -->
        <!-- <form action="{{ route('clientes.edit', $cliente) }}" method="POST">
          @csrf
          @method('PUT')
          <div class="row mb-3">
            <label for="inputText" class="col-2 col-form-label">Nombres y apellidos</label>

            <div class="col-10">
              <div class="input-group">
                <input type="text" name="Firstname" disabled class="form-control form-control-lg" placeholder="* Nombres" value="{{ $cliente->nombre }}">
                <input type="text" name="Lastname" disabled class="form-control form-control-lg" placeholder="* Apellidos" value="{{ $cliente->apellido }}">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-2 col-form-label">Documento</label>

            <div class="col-10">
              <div class="input-group">
                <input type="text" name="document" disabled class="form-control form-control-lg" placeholder="* Número documento" value="{{ $cliente->tipo_documento}}">
                <input type="text" name="document" disabled class="form-control form-control-lg" placeholder="* Número documento" value="{{ $cliente->documento}}">
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Genero</label>
            <div class="col-sm-10">
            <input type="text" disabled class="form-control form-control-lg" name="age" value="{{ $cliente->genero}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="number" class="col-sm-2 col-form-label">Edad</label>
            <div class="col-sm-10">
              <input type="number" disabled class="form-control form-control-lg" name="age" value="{{ $cliente->edad}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="number" class="col-sm-2 col-form-label">Teléfono</label>
            <div class="col-sm-10">
              <input type="number" disabled class="form-control form-control-lg" name="phone" value="{{ $cliente->telefono}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputcity" class="col-sm-2 col-form-label">Ciudad</label>
            <div class="col-sm-10">
              <input type="text" disabled class="form-control form-control-lg" name="city" value="{{ $cliente->ciudad}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputadress" class="col-sm-2 col-form-label">Dirección</label>
            <div class="col-sm-10">
              <input type="text"  disabled class="form-control form-control-lg" name="adress" value="{{ $cliente->direccion}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Correo Electronico</label>
            <div class="col-sm-10 ">
              <input type="email" disabled class="form-control form-control-lg" name="email" value="{{ $cliente->email}}">
            </div>
          </div>

          <div class="row mb-3">
            <label for="tipopersona" class="col-sm-2 col-form-label">Tipo de Persona</label>

            <div class=" row col-sm-10 ps-4">

              <div class="form-check form-switch col-5 pt-2">
                <input class="form-check-input" type="radio" name="tipopersona" id="flexRadioDefault1" checked value="Cliente">
                <label class="form-check-label" for="flexRadioDefault1">
                  Cliente
                </label>
              </div>

            </div>
          </div>




        </form> -->


      </div>
    </div>
  </main>


  <!-- ======= Footer ======= -->
  @include('Templates.footer')
