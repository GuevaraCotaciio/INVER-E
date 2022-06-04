<head>
<title>Inver-E / Informes</title>
</head>
  <!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->


  <!-- ======= Contendor Principal  ======= -->
  <main class="col-12 ps-1" style="background-color: #e8edf4;">

    <!-- Tirulos modulos-->
    <div class="pagetitle ps-4">
      <h1>Informes</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Informes</li>
        </ol>
      </nav>
    </div>

    <!-- ========= OPCIONES  ========= -->
    <div class="col-lg-12">
      <div class="card-body"></div>
      <div class="row col-sm-12   align-items-center justify-content-center">


        <div class="col-sm-2 bg-white">
           <div class="pe-0 card-body">
              <a class="ps-0 pe-0 nav-link" href="{{ route('informes.clientes') }}"><h5 class="card-title">Informe Clientes</h5></a>
              <div class="d-flex align-items-center">
                <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                  <a href="{{ route('informes.clientes') }}"><i class="bi bi-person-lines-fill" style="color: #2eca6a;"></i></a>
                </div>
                <div class="ps-2">
                  <h6>145</h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                </div>
              </div>
           </div>
        </div>

        <div class="col-sm-2 bg-white ms-4">
           <div class="pe-0 card-body">
              <a class="ps-0 pe-0 nav-link" href="{{ route('informes.productos') }}"><h5 class="card-title">Informe Productos</h5></a>
              <div class="d-flex align-items-center">
                <div  style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                  <a href="{{ route('informes.productos') }}"><i class="bi bi-list-columns" style="color: #2eca6a;"></i></a>
                </div>
                <div class="ps-2">
                  <h6>145</h6>
                  <span class="text-success small pt-1 fw-bold">12</span> <span class="text-muted small pt-2 ps-1">increase</span>
                </div>
              </div>
           </div>
        </div>

        <div class="col-sm-2 bg-white ms-4">
           <div class="pe-0 card-body">
              <a class="ps-0 pe-0 nav-link" href="{{ route('informes.pedidos') }}"><h5 class="card-title">Informe Pedidos</h5></a>
              <div class="d-flex align-items-center">
                <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                  <a href="{{ route('informes.pedidos') }}"><i class="bi bi-card-checklist" style="color: #2eca6a;"></i></a>
                </div>
                <div class="ps-2">
                  <h6>145</h6>
                  <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span>
                </div>
              </div>
           </div>
        </div>

        <div class="col-sm-2 bg-white ms-4">
            <div class="pe-0 card-body">
               <a class="ps-0 pe-0 nav-link" href="{{ route('informes.produccion') }}"><h5 class="card-title">Informe Producción</h5></a>
               <div class="d-flex align-items-center">
                 <div style="border-radius: 50%!important; background-color:#e0f8e9; width: 64px; height: 64px; font-size: 32px;" class=" d-flex align-items-center justify-content-center">
                   <a href="{{ route('informes.produccion') }}"><i class="bi bi-list-columns-reverse" style="color: #2eca6a;"></i></a>
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



    <!-- ========= Contenedor tablas ========= -->
    <section class="mt-5">
        <div class="row col-lg-12 align-items-center justify-content-center">

            <!-- ========= Titulos y buscador ========= -->
            <div class="row col-lg-12 p-3 align-items-center justify-content-center">
                <div class="row col-12 p-0">

                    <div class="col-7">

                      <div class="row">
                        <h5 class=" pt-2 ps-2">Informes Basicos </h5>
                      </div>

                    </div>
                    <div class="col-4 ps-1 pt-1 pe-0">
                    </div>
                    <div class="col-1 ps-1 p-0">
                      <a class="btn  btn-info "> <i class="bi bi-search"></i> Buscar </a>
                    </div>
                </div>
            </div>

            <!-- ========= Tablas ========= -->
            <div class="row col-lg-12 ps-2 pe-0 pb-3">

                <!-- ========= informacion de reportes  =========-->
                <div class="col-12  ps-3 pe-1">
                    <div class="card">
                        <div class="table-responsive p-4 pt-5">
                            <table class="table" id="tablaclientes">
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
                                    <tr>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                      <td class="border-top">Proximamente</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>

        </div>
    </section>

  </main><!-- End Conten -->


  <!-- ======= Footer ======= -->
  @include('Templates.footer')

