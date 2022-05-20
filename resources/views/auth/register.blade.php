
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://icon-icons.com/es/icono/bolso-malet%C3%ADn-negocios-bolsa-documentos-oficina-cartera/107789">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inver-E / Autenticación</title>
</head>
<body>

<!-- Panel  -->
<div class="container-fluid content py-5 mt-2">
    <div class="row justify-content-center">

        <!--login-->
        <div class="col-md-4 bg-dark text-white pb-5" style="border-radius: 1rem;" >
            <div class="card-body p-md-3 mx-md-2">

                <div class="text-center">
                    <h2 class="mt-1 mb-3 ">Registrate</h2>
                </div>

                <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-outline mb-3">
                        <label class="form-label" for="name" >* Nombre y Apellido</label>
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
                    <div class="form-outline mb-3">
                        <label class="form-label" for="password-confirm">* Confirmar Clave</label>
                        <!-- <input type="password" id="form4" class="form-control" placeholder="********" /> -->
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="********">
                    </div>

                    <div class="row  text-center ">
                        <div class="">
                             <button class="btn btn-primary" type="submit">Aceptar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

@include('Templates.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>
