
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
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#actualizar_clave"><i class="bi bi-fingerprint"></i> Cambiar Clave</button>
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
                </div><!-- End perfil de empresa -->





                <div class="tab-pane fade pt-3" id="editar_perfil">
                  <!-- Editar Perfil -->
                  <form>

                    <div class="row col-12 mb-3">
                      <div class="col-md-8 col-lg-9">

                        <h5 class="card-title">Editar infromación de usuario.</h5>
                        <p class="small fst-italic">Cargo: Operario de alimentos.</p>

                        <h5 class="card-title">Detalles del Peril</h5>

                        <div class="row col-12">
                          <div class="col-lg-3 col-md-4 label ">Full Name</div>
                          <div class="col-lg-9 col-md-8">Kevin Anderson</div>
                        </div>

                        <div class="row col-12">
                          <div class="col-lg-3 col-md-4 label">Company</div>
                          <div class="col-lg-9 col-md-8">Lueilwitz, Wisoky and Leuschke</div>
                        </div>

                        <div class="row col-12">
                          <div class="col-lg-3 col-md-4 label">Job</div>
                          <div class="col-lg-9 col-md-8">Web Designer</div>
                        </div>

                        <div class="row col-12">
                          <div class="col-lg-3 col-md-4 label">Country</div>
                          <div class="col-lg-9 col-md-8">USA</div>
                        </div>

                        <div class="row col-12">
                          <div class="col-lg-3 col-md-4 label">Address</div>
                          <div class="col-lg-9 col-md-8">A108 Adam Street, New York, NY 535022</div>
                        </div>

                        <div class="row col-12">
                          <div class="col-lg-3 col-md-4 label">Phone</div>
                          <div class="col-lg-9 col-md-8">(436) 486-3538 x29071</div>
                        </div>

                        <div class="row col-12">
                          <div class="col-lg-3 col-md-4 label">Email</div>
                          <div class="col-lg-9 col-md-8">k.anderson@example.com</div>
                        </div>
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                  </form><!-- End Editar Perfil -->
                </div>


                <div class="tab-pane fade pt-3" id="actualizar_clave">
                  <!-- Cambiar clave -->
                  <form>

                    <div class="row col-12 mb-3">
                      <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="password" type="password" class="form-control" id="currentPassword">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row col-12 mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Change Password</button>
                    </div>
                  </form><!-- End Cambiar clave -->
                </div>


                <!-- informacion de proyecto -->
                <div class="tab-pane fade Seccion_informacion" id="Seccion_informacion">

                  <h5 class="card-title mt-4">Información del INVER-E</h5>
                  <p class="small fst-italic">Spftware   Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quia accusamus dolor ullam odit rerum. Perspiciatis enim distinctio aliquid aperiam quaerat labore doloremque illo consequatur, alias ex itaque autem eum nam. especializado en  perspiciatis odit. Fuga sequi sed ea saepe at unde.</p>

                  <h5 class="card-title mt-3">Profile Details</h5>

                  <div class="row col-12">
                    <div class="col-lg-9 col-md-8"><h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos esse consectetur odio possimus in repellendus, minus eum, non commodi rem labore quas velit iusto quibusdam culpa earum soluta officiis. Delectus.</h6></div>
                  </div>
                  <div class="row col-12">
                    <div class="col-lg-9 col-md-8"><h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos esse consectetur odio possimus in repellendus, minus eum, non commodi rem labore quas velit iusto quibusdam culpa earum soluta officiis. Delectus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quibusdam laborum deserunt odit tempora libero quae necessitatibus. Consequatur atque eum optio saepe culpa quis eos? Dolorum nulla quae fugiat omnis.</h6></div>
                  </div>

                  <!-- politica de datos -->
                  <h5 class="card-title mt-3">Profile Details</h5>

                  <div class="row col-12">
                    <div class="col-lg-9 col-md-8"><h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos esse consectetur odio possimus in repellendus, minus eum, non commodi rem labore quas velit iusto quibusdam culpa earum soluta officiis. Delectus.</h6></div>
                  </div>
                  <div class="row col-12">
                    <div class="col-lg-9 col-md-8"><h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos esse consectetur odio possimus in repellendus, minus eum, non commodi rem labore quas velit iusto quibusdam culpa earum soluta officiis. Delectus.</h6></div>
                  </div>
                  <div class="row col-12">
                    <div class="col-lg-9 col-md-8"><h6>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quos esse consectetur odio possimus in repellendus, minus eum, non commodi rem labore quas velit iusto quibusdam culpa earum soluta officiis. Delectus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus quibusdam laborum deserunt odit tempora libero quae necessitatibus. Consequatur atque eum optio saepe culpa quis eos? Dolorum nulla quae fugiat omnis.</h6></div>
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


