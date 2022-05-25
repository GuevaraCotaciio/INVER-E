<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">   <!--Icons-->
    <!-- <style type="text/css"> *main{ background-color: #96f19b } *section{ background-color: #96f19b }</style>   tipor de letra -->
    <title>Inver-E </title>
</head>
<body>


<!--======= NAV ========-->
<div class="pos-f-t">
  <nav class=" ps-2 navbar navbar-dark bg-dark">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
      <a class="navbar-toggler-icon " data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample"></a>  <!-- boton de accion del menu -->
    </button>

      <a href="{{ route('home') }}" class=" ms-3 nav-link text-white"> INVER-E:  <span class="text-danger "> El artesanal de Richard</span></a>

      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
        <img src="{{asset('images/facebook.png')}}" alt="Profile" class="rounded-circle" style="width: 30px;">
        <span class="d-none d-md-block text-danger dropdown-toggle ps-2 pe-4">{{ Auth::user()->name }}</span>
      </a><!-- End Profile Iamge Icon -->

      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile col-md-2">
        <li class="dropdown-header ">
          <h6>{{ Auth::user()->name }}</h6>
          <span>{{ Auth::user()->cargo }} </span>
        </li>

        <li> <hr class="dropdown-divider"> </li>

        <li>

          <a class="dropdown-item d-flex align-items-center" href="{{ route('configuracion.general', Auth::user()->id) }}">
            <i class="bi bi-gear nav-link"></i> <span>Configuración</span>
          </a>
        </li>

        <li> <hr class="dropdown-divider"> </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-power nav-link"></i> <span>Cerrar Sesión</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
        </li>


      </ul><!-- End Profile Dropdown Items -->
  </nav>
</div> <!--======= END NAV ========-->

<!--======= PANEL ========-->
<div style="width: 20em" class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <a class="nav-link p-1" href="{{ route('home') }}"> <h4 class="offcanvas-title" >Dashboard Inver-E</h4>  </a>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">

      <!--SLIDE NAV-->
      <aside id="sidebar" class="sidebar" >
        <ul class="sidebar-nav" id="sidebar-nav"  style=" list-style: none; padding: 1px; font-size: 20px;">

          <li class="nav-item" >
            <a class=" collapsed dropdown-item d-flex" data-bs-target="#components-nav" data-bs-toggle="collapse" >
              <i class="bi bi-person-check me-2" style="font-size: 20px;"></i> <span>  Clientes  </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>

            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav" style="list-style: none; ">
              <li> <a class="dropdown-item mt-1" href="{{ route('clientes_create') }}" > <i class="bi bi-person-plus"></i> <span class="ps-2">Agregar</span> </a>  </li>
              <li> <a class="dropdown-item mt-1" href="{{ route('clientes_general') }}"> <i class="bi bi-ui-checks"></i> <span class="ps-2">Listas</span> </a> </li>
            </ul>
          </li><!-- End Components Nav -->


          <li class="nav-item">
            <a class="collapsed dropdown-item d-flex" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
              <i class="bi bi-card-checklist me-2" ></i><span>  Pedidos   </span> <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav" style="list-style: none; ">
              <li> <a class="dropdown-item mt-1" href="forms-elements.html"> <i class="bi bi-clipboard2-plus"></i><span class="ps-2">  Agregar </span> </a> </li>
              <li> <a class="dropdown-item mt-1" href="forms-layouts.html"> <i class="bi bi-clipboard2-check"></i><span class="ps-2">  Actualizar </span> </a> </li>
              <li> <a class="dropdown-item mt-1" href="forms-editors.html"> <i class="bi bi-clipboard2-x"></i><span class="ps-2">  Eliminar </span> </a>  </li>
              <li> <a class="dropdown-item mt-1" href="forms-validation.html"> <i class="bi bi-bar-chart-steps"></i><span class="ps-2"n>  Historial</span> </a> </li>
            </ul>
          </li><!-- End Pedidos Nav -->


          <li class="nav-item">
            <a class="nav-link collapsed dropdown-item d-flex" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#" >
             <i class="bi bi-cart4 me-2"></i><span>  Productos   </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav" style="list-style: none;">
              <li> <a class="nav-link dropdown-item d-flex" href="charts-chartjs.html"> <i class="bi bi-cart-plus"></i><span class="ps-2"> Agregar  </span> </a></li>
              <li> <a class="nav-link dropdown-item d-flex" href="charts-apexcharts.html"> <i class="bi bi-cart-x"></i><span class="ps-2"> Elminar  </span> </a> </li>
              <li> <a class="nav-link dropdown-item d-flex" href="charts-echarts.html"> <i class="bi bi-cart-check"></i><span class="ps-2"> Actualizar </span> </a> </li>
            </ul>
          </li><!-- End Productos Nav -->


          <li class="nav-item">
            <a class=" collapsed dropdown-item d-flex" data-bs-target="#infromes-nav" data-bs-toggle="collapse" href="#" >
             <i class="bi bi-graph-up-arrow me-2"></i><span>  Informes   </span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="infromes-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav" style="list-style: none;">
              <li> <a class="nav-link dropdown-item d-flex" href="infromes-chartjs.html"> <i class="bi bi-file-pdf"></i><span class="ps-2"> Productos </span> </a></li>
              <li> <a class="nav-link dropdown-item d-flex" href="infromes-apexcharts.html"> <i class="bi bi-file-pdf"></i><span class="ps-2"> Ventas </span> </a> </li>
              <li> <a class="nav-link dropdown-item d-flex" href="infromes-echarts.html"> <i class="bi bi-file-pdf"></i><span class="ps-2"> Pedidos </span> </a> </li>
            </ul>
          </li><!-- End Informes Nav -->


          <li class="nav-item">
            <a class="nav-link collapsed dropdown-item d-flex" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
               <i class="bi bi-people me-2"></i><span>  Usuarios  </span><i class=" ms-4 bi bi-chevron-down ms-auto" ></i>
            </a>
            <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav" style="list-style: none;">
              <li> <a class="nav-link dropdown-item d-flex" href="tables-general.html"> <i class="bi bi-person-plus-fill"></i><span class="ps-2">  Agregar</span> </a> </li>
              <li> <a class="nav-link dropdown-item d-flex" href="tables-data.html"> <i class="bi bi-person-lines-fill"></i><span class="ps-2">  Actualizar</span> </a> </li>
            </ul>
          </li><!-- End Usuarios Nav -->


          <li class="nav-item">
            <a class="nav-link collapsed dropdown-item d-flex"  href="{{ route('configuracion.general', Auth::user()->id) }}">
              <i class="bi  bi-sliders me-2"></i><span>  Configuración</span>
            </a>
          </li> <hr><!-- End Icons Nav -->


          <a class="nav-heading nav-link text-muted"> <h6>Otras opciones </h6> </a>
          <li class="row nav-item col-md-8 ps-3 ">
            <a class="text-primary" href="https://facebook.com/" title="Facebbok" style="width: 40px;"> <i class="bi bi-facebook"></i> </a>
            <a class="text-danger" href="https://www.instagram.com" title="Instagram" style="width: 40px;"> <i class="bi bi-instagram"></i> </a>
            <a class="text-success" href="https://whatsapp.com/" title="Whatsapp" style="width: 40px;"> <i class="bi bi-whatsapp"></i> </a>
            <a class="text-info" href="https://gmail.com/" title="Gmail" style="width: 40px;"> <i class="bi bi-envelope-check"></i> </a>
          </li>

          <li class="nav-item"> <a class="nav-link dropdown-item d-flex" href="{{ route('home') }}" title="Salir del sistema"> <i class="bi bi-power"></i> <span>Cerrar Sesión</span></a> </li>
          <!-- End Profile Page Nav -->

        </ul>
      </aside>

  </div>
</div>



  <!-- links JS Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
