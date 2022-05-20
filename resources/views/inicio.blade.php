<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="https://icon-icons.com/es/icono/bolso-malet%C3%ADn-negocios-bolsa-documentos-oficina-cartera/107789">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Inver-E / Inicio</title>
</head>
<body>

<!-- nav de infromarcion y nombre -->
<nav class="navbar navbar-light bg-main">
        <div class="container p-4">
            
        </div>
    </nav>              

<!-- Panel  -->
<section class="container-fluid content py-5 mb-5">
    <div class="row justify-content-center">

        <!-- Contenido -->
        <div class="col-12 col-md-5 ">
                <h1 class="text-center pt-3 pb-3">Gestiona tu producción y registros de productos</h1><hr>

                <p class="text-left mt-3 post-txt">
                    <span>Empresa: </span>
                    <span class="float-right"> Variable nombre Empresa</span>
                </p>
                <p class="text-left">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Eaque nemo accusantium libero hic repellat corporis assumenda
                    debitis adipisci modi expedita inventore vel excepturi,
                    facere animi accusamus? Voluptatem ab ad harum?
                </p>
        </div>

        <!--separador-->
        <div class="col-md-1"></div>

        <!--login-->
        <div class="col-md-4 bg-dark text-white" style="border-radius: 1rem;" >
            <div class="card-body p-md-3 mx-md-2">

                <div class="text-center">
                    <h2 class="mt-1 mb-3 pb-1">Ingresa</h2>
                </div>

                <form>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form1">* Usuario</label>
                        <input type="email" id="form1" class="form-control" placeholder="E-mail"/>
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2">* Clave</label>
                        <input type="password" id="form2" class="form-control" placeholder="********" />
                    </div>

                    <div class="row  text-center ">
                        <div class="mb-4">
                             <a class="btn btn-primary" type="button" href="{{ route('home') }}">Aceptar</a>
                        </div>
                                <a class="text-muted mb-5" href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    </div>

                    <div class="d-flex align-items-center justify-content-center pb-4">
                        <p class="mb-0 me-2">¿No tienes una cuenta?</p>
                        <a type="button" class="btn btn-outline-danger" href="{{ route('register') }}">Crear Cuenta</a>
                    </div>
                </form>
            </div>
        </div>

        
    </div>
</section>



@include('Templates.footer')

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>