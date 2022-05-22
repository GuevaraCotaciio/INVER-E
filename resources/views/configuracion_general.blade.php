
<head>
    <title>Inver-E / Configuración</title>
</head>

  <!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->

   <!-- ======= Content  ======= -->
  <main class="col-12 ps-1" style="background-color: #e8edf4;">

    <!-- Titulo modulos-->
    <div class="pagetitle ps-4">
      <h1>Configuración</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Configuracion</li>
        </ol>
      </nav>
    </div>

    <section class="section dashboard pb-5">
      <div class="row col-12">


        <!-- ======= Contenedor items ======= -->
        <div class="col-lg-12">

            <div class="row col-12 ps-4 pt-4">
                <div class="card-body pt-3">

                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">

                      <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#editar_empresa"><i class="bi bi-building"></i> Empresa</button>
                      </li>

                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#editar_perfil"><i class="bi bi-file-earmark-person"></i> Editar Perfil</button>
                      </li>



                      <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#Seccion_informacion"><i class="bi bi-question-circle"></i> Información</button>
                      </li>
                    </ul>

                    <!--  Contenido  -->
                    <div class="tab-content pt-2">

                        <!-- perfil de empresa -->
                        <div class="tab-pane fade editar_empresa active show pt-3 " id="editar_empresa">

                            @if (count($datosempresa)<= 0 )

                            <form action="{{ route('configuracion.SaveEmpresa') }}" >
                                @csrf

                                @dd($datosempresa)

                                <div class="row col-12 mb-3">
                                  <label  class="col-md-4 col-lg-3 col-form-label">Peril Empresarial</label>

                                  <div class="col-md-8 col-lg-9">
                                    <img src="" alt="Profile" style="width: 80px;">

                                    <div class="pt-2">
                                        <div class="input-group mb-3 ">

                                            <div class="custom-file me-2">
                                                <input type="file" hidden class="custom-file-input" id="inputFile" name="archivo">
                                                <a class="btn btn-success" title="Cargar nueva imagen" name="imagen">
                                                    <label class="custom-file-label" for="inputFile"><i class="bi bi-upload"></i></label>
                                                </a>
                                            </div>

                                            <a class="btn btn-danger" title="Eliminar la imagen"><i class="bi bi-trash"></i></a>

                                          </div>
                                    </div>

                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Nombre_E" class="col-md-4 col-lg-3 col-form-label">Nombre Completo</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="Nombre_E" type="text" class="form-control" id="Nombre_E" value="{{ $datosempresa->nombre }}">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">

                                    <label for="inputText" class="col-md-4 col-lg-3 col-form-label">Tipo Empresa</label>
                                    <div class="col-md-8 col-lg-8">
                                      <div class="input-group">
                                        <select class="form-select form-select-lg" name="tipoE">
                                          <option selected>Seleccione el tipo</option>
                                          <option value="Productora">Productora</option>
                                          <option value="Manufacturera">Manufacturera</option>
                                          <option value="Agricola">Agricola</option>
                                        </select>
                                     </div>
                                    </div>

                                </div>

                                <div class="row col-12 mb-3">

                                  <label for="about" class="col-md-4 col-lg-3 col-form-label">Descripción corporativa</label>
                                  <div class="col-md-8 col-lg-8">
                                    <textarea name="description" class="form-control" id="about" style="height: 100px" placeholder="Misión y Visión empresarial."></textarea>
                                  </div>

                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Ciudad" class="col-md-4 col-lg-3 col-form-label">Ciudad</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="Ciudad" type="text" class="form-control" id="Ciudad" placeholder="* Localidad">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="address" type="text" class="form-control" id="Address" placeholder="* Localización">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Número de teléfono</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="phone" type="text" class="form-control" id="Phone" placeholder="* (602) 486 90 71">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Correo electronico</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="email" type="email" class="form-control" id="Email" placeholder="ejemplo@gmail.com">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Perfil de Facebook</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="facebook" type="text" class="form-control" id="Facebook" placeholder="https://facebook.com/#">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Perfil Instagram</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="instagram" type="text" class="form-control" id="Instagram" placeholder="https://instagram.com/#">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="whatsapp" class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="whatsapp" type="text" class="form-control" id="whatsapp" placeholder="https://api.whatsapp.com/send?phone=573207203628&text=">
                                  </div>
                                </div>

                                <div class="text-center">
                                  <button type="submit" class="btn btn-success">Guardar Cambios</button>
                                </div>
                            </form>

                            @else

                            @foreach  ($datosempresa as $infoempresa)

                                <div class="row col-12 mb-3">
                                    <label  class="col-md-4 col-lg-3 col-form-label">Peril Empresarial</label>
                                    <div class="col-md-8 col-lg-9">
                                      <img src="{{ Storage::url($infoempresa->imagen) }}" alt="Profile" style="width: 80px;">

                                      <div class="pt-2">
                                          <div class="input-group mb-3 ">

                                              <div class="custom-file me-2">
                                                  <input type="file" hidden class="custom-file-input" id="inputFile" name="archivo">
                                                  <a class="btn btn-success" title="Cargar nueva imagen" name="imagen">
                                                      <label class="custom-file-label" for="inputFile"><i class="bi bi-upload"></i></label>
                                                  </a>
                                              </div>

                                              <a class="btn btn-danger" title="Eliminar la imagen"><i class="bi bi-trash"></i></a>

                                            </div>
                                      </div>

                                    </div>
                                </div>

                                <div class="row col-12 mb-3">
                                    <label for="Nombre_E" class="col-md-4 col-lg-3 col-form-label">Nombre Completo</label>
                                        <div class="col-md-8 col-lg-8">
                                        <input name="Nombre_E" type="text" class="form-control " id="Nombre_E" disabled value="{{ $infoempresa->nombre }}">
                                    </div>
                                </div>

                                <div class="row col-12 mb-3">
                                    <label for="inputText" class="col-md-4 col-lg-3 col-form-label">Tipo Empresa</label>
                                    <div class="col-md-8 col-lg-8">
                                      <div class="input-group">
                                        <select class="form-select form-select-lg" name="tipoE">
                                          <option selected>Seleccione el tipo</option>

                                          <option value="Productora">Productora</option>

                                          <option value="Manufacturera">Manufacturera</option>

                                          <option value="Agricola">Agricola</option>

                                        </select>
                                     </div>
                                    </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="about" class="col-md-4 col-lg-3 col-form-label">Descripción corporativa</label>
                                  <div class="col-md-8 col-lg-8">
                                    <textarea name="description" class="form-control" id="about" style="height: 100px" disabled aria-valuenow="{{ $infoempresa->descripcion }}"></textarea>
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Ciudad" class="col-md-4 col-lg-3 col-form-label">Ciudad</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="Ciudad" type="text" class="form-control" id="Ciudad" disabled value="{{$infoempresa->ciudad}}">
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Address" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="address" type="text" class="form-control" id="Address" value="{{$infoempresa->direccion}}" disabled>
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Número de teléfono</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="phone" type="text" class="form-control" id="Phone" value="{{$infoempresa->telefono}}" disabled>
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Email" class="col-md-4 col-lg-3 col-form-label">Correo electronico</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="email" type="email" class="form-control" id="Email" value="{{$infoempresa->email}}" disabled>
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Perfil de Facebook</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="facebook" type="text" class="form-control" id="Facebook" value="{{$infoempresa->facebook}}" disabled>
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Perfil Instagram</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="instagram" type="text" class="form-control" id="Instagram" value="{{$infoempresa->instagram}}" disabled>
                                  </div>
                                </div>

                                <div class="row col-12 mb-3">
                                  <label for="whatsapp" class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                                  <div class="col-md-8 col-lg-8">
                                    <input name="whatsapp" type="text" class="form-control" id="whatsapp" value="{{$infoempresa->whatsapp}}" disabled>
                                  </div>
                                </div>

                                <div class="text-center">
                                  <button type="submit" class="btn btn-warning btn-lg">Actualizar información</button>
                                </div>

                            @endforeach
                            @endif
                        </div>

                        <!-- Editar Perfil -->
                        <div class="tab-pane fade pt-3" id="editar_perfil">

                            @foreach ($datos_user as $usuario )
                            <form>

                                <div class="row col-12 mb-3">
                                    <div class="col-md-8 col-lg-9">

                                        <h5 class="card-title"></h5>

                                        <div class="row col-lg-12">   <!-- contenedor -->
                                            <div class="col-lg-2 me-4">  <!-- foto del clinte -->

                                                <div class=" p-0 border-0 ">
                                                    <img src="{{ Storage::url($usuario->avatar) }}" alt="" width="110px">
                                                </div>

                                                <div class="card-body ps-0">
                                                    <div class="input-group ">
                                                        <div class="custom-file me-2">
                                                            <input type="file" hidden class="custom-file-input" id="inputFile" name="archivo_cliente">
                                                            <a class="btn btn-success" title="Cargar nueva imagen" name="imagen">
                                                                <label class="custom-file-label" for="inputFile"><i class="bi bi-upload"></i></label>
                                                            </a>

                                                        </div>
                                                        <button type="reset" class="btn btn-danger" title="Eliminar la imagen"><i class="bi bi-trash"></i></button>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-lg-4 ms-5 ps-3">
                                                <h6 class="card-title">Información de usuario.</h6>
                                                <p class=" fst-italic">Cargo:  <span class="ms-4">{{ Auth::user()->cargo }}</span></p>
                                                <p class=" fst-italic">Genero: <span class="ms-3">{{ $usuario->genero }}</span></p>
                                                <p class=" fst-italic">Edad:   <span class="ms-4">{{ $usuario->fecha_nacimiento }}</span></p>
                                            </div>

                                        </div>


                                        <div class="row col-12">
                                          <div class="col-lg-3 col-md-4 label ">Nombre Completo</div>

                                          <div class="col-lg-9 col-md-8">
                                            <div class="input-group">
                                                <input type="text" name="Firstname" class="form-control form-control-lg" placeholder="* Nombres" value="{{$usuario->nombre}}">
                                                <input type="text" name="Lastname" class="form-control form-control-lg" placeholder="* Apellidos" value="{{$usuario->apellido}}">
                                              </div>
                                          </div>
                                        </div>

                                        <div class="row col-12">
                                            <div class="col-lg-3 col-md-4 label">Documento</div>
                                            <div class="col-lg-9 col-md-8">

                                                <div class="row">

                                                    <div class="input-group">
                                                        <select class="form-select form-select-lg" name="tipoDoc">
                                                          <option selected="">Seleccione tipo documento</option>
                                                           @if($usuario->tipo_documento == "CC")
                                                                <option selected value="CC">Cédula Ciudadania</option>
                                                                <option value="CE">Cédula Extrangeria</option>
                                                                <option value="TI">Tarjeta Identidad</option>
                                                            @elseif ($usuario->tipo_documento == "CE")
                                                                <option value="CC">Cédula Ciudadania</option>
                                                                <option selected value="CE">Cédula Extrangeria</option>
                                                                <option value="TI">Tarjeta Identidad</option>
                                                            @elseif ($usuario->tipo_documento == "TI")
                                                                <option value="CC">Cédula Ciudadania</option>
                                                                <option value="CE">Cédula Extrangeria</option>
                                                                <option selected value="TI">Tarjeta Identidad</option>
                                                            @endif
                                                        </select>
                                                        <input type="text" name="document" class="form-control form-control-lg" value="{{ $usuario->documento }}">
                                                    </div>
                                                </div>
                                          </div>
                                        </div>

                                        <div class="row col-12">
                                          <div class="col-lg-3 col-md-4 label">Dirección</div>
                                          <div class="col-lg-9 col-md-8">
                                            <input type="text" class="form-control form-control-lg" name="adress" value="{{$usuario->direccion}}">
                                          </div>
                                        </div>

                                        <div class="row col-12">
                                          <div class="col-lg-3 col-md-4 label">Teléfono</div>
                                          <div class="col-lg-9 col-md-8">
                                            <input type="number" class="form-control form-control-lg" name="phone" value="{{$usuario->telefono}}">
                                          </div>
                                        </div>

                                        <div class="row col-12">
                                            <div class="col-lg-3 col-md-4 label">Ciudad</div>
                                            <div class="col-lg-9 col-md-8">
                                              <input type="text" class="form-control form-control-lg" name="city" value="{{$usuario->ciudad}}">
                                            </div>
                                        </div>

                                        <div class="row col-12">
                                          <div class="col-lg-3 col-md-4 label">Fecha nacimiento</div>
                                          <div class="col-lg-9 col-md-8">
                                            <input type="date" class="form-control form-control-lg" name="age" value="{{$usuario->fecha_nacimiento}}">
                                          </div>
                                        </div>

                                        <div class="row col-12">
                                          <div class="col-lg-3 col-md-4 label">Email</div>
                                          <div class="col-lg-9 col-md-8">
                                            <input type="email" class="form-control form-control-lg" name="email" value="{{$usuario->email}}">
                                          </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-center">
                                  <button type="submit" class="btn btn-success">Actualizar</button>
                                </div>
                            </form><!-- End Editar Perfil -->
                            @endforeach
                        </div>

                        <!-- informacion de proyecto -->
                        <div class="tab-pane fade Seccion_informacion" id="Seccion_informacion">

                            <h5 class="card-title mt-4">Información del sistema INVER-E</h5>
                            <p class="small fst-italic">Es un aplicacion que ayuda a controlar los productos que comercializa o produce su empresa para su modelo de negocio,  cuenta con 5 bases principales para llevar un control de los productos.</p>


                            <h5 class="card-title mt-3">Creación de inver-e</h5>
                            <div class="row col-12">
                                <div class="col-lg-9 col-md-8"><h6>Esté sistema es creado con la intención de ayudar a las pequeñas empresas a controlar sus porductos y tener un orden de estos.</h6></div>
                            </div>
                            <div class="row col-12">
                                <div class="col-lg-9 col-md-8"><h6>Es muy importante para cada empresa tener un control constante de todos sus productos y que ademas genere reportes especificos que ayudaran a que su empresa sea más productiva.</h6></div>
                            </div>


                            <h5 class="card-title mt-3">Motivos</h5>

                            <div class="row col-12">
                                <div class="col-lg-9 col-md-8"><h6>Inver-E es creada por la necesidad que padecen las empresas pequeñas mayormente con la carencia de controles automaticos para el control de productos creados por la misma empresa o adquirdos para ser procesados.
                                  Por este motivo principal se comenzo el desarollo de INVER_E el cual busca solucionar este problema y cumplir con las espectaticas de las empresas a las cuales esta dirigido.</h6></div>
                            </div>


                            <h5 class="card-title mt-3">Politica de uso</h5>

                            <div class="row col-12">
                                <div class="col-lg-9 col-md-8"><h6>Inver-E es de uso libre para la espresas que lo necesiten y su código esta publicado en GitHub.</h6>
                                <span> Versión: 1.0</span></div>
                            </div>

                            <h5 class="card-title mt-3">Creado por</h5>
                            <div class="row col-12">
                                <div class="col-lg-9 col-md-8"><h6>Anderson Guevara. <span>| Cali-Colombia</span></h6> </div>
                            </div>


                        </div>


                    </div>

                </div>
            </div>
        </div><!-- End contenedor items -->


      </div>
    </section>
  </main><!-- End Conten -->

  <!-- ======= Footer ======= -->
  @include('Templates.footer')


