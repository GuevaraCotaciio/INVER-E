<head>
    <title>Inver-E / Usuarios-Agregar</title>
</head>

<!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->

   <!-- ======= Content  ======= -->
  <main class="col-12 ps-1 pb-3" style="background-color: #e8edf4;">

    <!-- Tirulos modulos-->
    <div class="pagetitle ps-4">
      <h1>Usuarios</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('usuarios.general') }}">Usuarios</a></li>
          <li class="breadcrumb-item active">Registro</li>
        </ol>
      </nav>
    </div>

    <div class="card ms-2 me-3">
      <div class="card-body m-4">

        <h4 class="card-title mb-5">Crear nuevo usuario</h4>

        @if (session()->has('fine'))
        <div class="alert alert-success border-2 border-success">{{ session('fine')}}</div>
        @elseif (session()->has('fail'))
        <div class="alert alert-danger">{{ session('fail')}}</div>
        @endif

        <form method="POST" action="{{ route('usuarios.registro') }}">
            @csrf
            <input type="radio" name="tipo" value="Usuario" checked hidden>

            <div class="form-outline mb-3">
                <label class="form-label" for="name" >* Nombre de usuario</label>
                <!-- <input type="email" id="form1" class="form-control" placeholder="Nombres" autofocus/> -->
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nombres" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>

            <div class="form-outline mb-3">
                <label class="form-label" for="email">*E-mail</label>
                <!-- <input type="email" id="form2" class="form-control" placeholder="Correo Electronico"/> -->
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo Electronico">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>

            <div class="form-outline mb-3">
                <label class="form-label" for="password">* Clave</label>
                <!-- <input type="password" id="form3" class="form-control" placeholder="********" /> -->
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="********">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
            </div>

            <div class="row  text-center ">
                <div class="">
                     <button class="btn btn-primary" type="submit">Guardar</button>
                </div>
            </div>
        </form>

      </div>
    </div>
  </main>


  <!-- ======= Footer ======= -->
  @include('Templates.footer')
