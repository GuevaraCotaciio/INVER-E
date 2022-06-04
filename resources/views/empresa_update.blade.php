<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script defer src="{{asset('styles\event.js')}}"></script>  {{-- scrip de nuevo item --}}

    <title>Inver-E / Empresa</title>
</head>
<body>

  <!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->


    <main class="col-12" style="background-color: #e8edf4; ">

        <!-- Tirulos modulos-->
        <div class="pagetitle ps-4 ">
          <h1>Empresa</h1>
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('configuracion.general', Auth::user()->id) }}">Configuración</a></li>
              <li class="breadcrumb-item active">Editar Empresa</li>
            </ol>
          </nav>
        </div>

        <section class="section dashboard pb-4 p-0 ps-0 ">

            <!-- perfil de empresa -->
            <div class="card bg-light p-3 ps-5 pt-5 ms-5 me-5 mt-5" id="editar_empresa">

                @if (count($datosempresa)> 0 )

                @foreach  ($datosempresa as $infoempresa)

                <form action="{{ route('configuracion.editEmpresa', $infoempresa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- @dd($datosempresa) --}}
                    <input type="number" hidden name="id_user" value="{{Auth::user()->id}}">

                    <div class="row col-12 mb-3">
                      <label  class="col-md-4 col-lg-3 col-form-label">Datos Empresa</label>

                      <div class="col-md-8 col-lg-9">
                        <img src="{{ Storage::url($infoempresa->imagen) }}" alt="Profile" style="width: 150px;">

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
                        <input name="Nombre_E" type="text" class="form-control" id="Nombre_E" value="{{ $infoempresa->nombre }}">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">

                        <label for="inputText" class="col-md-4 col-lg-3 col-form-label">Tipo Empresa</label>
                        <div class="col-md-8 col-lg-8">
                          <div class="input-group">
                            <select class="form-select form-select-lg" name="tipoE">
                                <option>Seleccione el tipo</option>

                                @if ($infoempresa->tipo_empresa	 == "Productora")
                                <option selected value="Productora">Productora</option>
                                <option value="Manufacturera">Manufacturera</option>
                                <option value="Agricola">Agricola</option>

                                @elseif ($infoempresa->tipo_empresa	 == "Manufacturera")
                                <option value="Productora">Productora</option>
                                <option selected value="Manufacturera">Manufacturera</option>
                                <option value="Agricola">Agricola</option>

                                @elseif ($infoempresa->tipo_empresa	 == "Agricola")
                                <option value="Productora">Productora</option>
                                <option value="Manufacturera">Manufacturera</option>
                                <option selected value="Agricola">Agricola</option>
                                @endif

                            </select>
                         </div>
                        </div>

                    </div>

                    <div class="row col-12 mb-3">

                      <label for="about" class="col-md-4 col-lg-3 col-form-label">Descripción corporativa</label>
                      <div class="col-md-8 col-lg-8">
                        <input type="text" name="description" class="form-control" value="{{$infoempresa->descripcion}}" placeholder="Misión y Visión empresarial.">
                      </div>

                    </div>

                    <div class="row col-12 mb-3">
                      <label for="Ciudad" class="col-md-4 col-lg-3 col-form-label">Ciudad</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="Ciudad" type="text" class="form-control" id="Ciudad" value="{{$infoempresa->ciudad}}" placeholder="* Localidad">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Dirección</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="address" type="text" class="form-control" id="Address" value="{{$infoempresa->direccion}}" placeholder="* Localización">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Número de teléfono</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="phone" type="text" class="form-control" id="Phone" value="{{$infoempresa->telefono}}" placeholder="* (602) 486 90 71">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Correo electronico</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="email" type="email" class="form-control" id="Email" value="{{$infoempresa->email}}" placeholder="ejemplo@gmail.com">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Perfil de Facebook</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="facebook" type="text" class="form-control" id="Facebook" value="{{$infoempresa->facebook}}" placeholder="https://facebook.com/#">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Perfil Instagram</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="instagram" type="text" class="form-control" id="Instagram" value="{{$infoempresa->instagram}}" placeholder="https://instagram.com/#">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="whatsapp" class="col-md-4 col-lg-3 col-form-label">Whatsapp</label>
                      <div class="col-md-8 col-lg-8">
                        <input name="whatsapp" type="text" class="form-control" id="whatsapp" value="{{$infoempresa->whatsapp}}" placeholder="https://api.whatsapp.com/send?phone=573207203628&text=">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Guardar Cambios</button>
                    </div>
                </form>

                @endforeach

                @else

                     <div class="row col-12 mb-3">
                        <label  class="col-md-4 col-lg-3 col-form-label">No hay datos de empresa para editar. </label>

                    </div>

                    {{--<div class="row col-12 mb-3">
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
                    </div> --}}


                @endif
            </div>

        </section>
    </main><!-- End Conten -->

    <!-- ======= Footer ======= -->
    @include('Templates.footer')


    <!-- links JS Bootstrap -->

  </body>
  </html>
