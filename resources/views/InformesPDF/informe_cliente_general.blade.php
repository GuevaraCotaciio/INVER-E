<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('css/app.css') }}" type="text/css">
    <title>Inver-E / Reportes</title>
</head>
<body>


    <!-- ======= Contendor Principal  ======= -->
    <main class="col-12 ps-1" style="background-color: #ffffff;">

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
                @if(count($listClientes)<=0)
                  <tr>
                    <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                  </tr>
                @else
                  @foreach ($listClientes as $clientes)
                    <tr>
                      <td class="border-top">{{$clientes->id }}</td>
                      <td class="border-top">{{$clientes->nombre }} {{$clientes->apellido }}</td>
                      <td class="border-top">{{$clientes->documento }}</td>
                      <td class="border-top">{{$clientes->genero }}</td>
                      <td class="border-top">{{$clientes->edad }}</td>
                      <td class="border-top">{{$clientes->telefono }}</td>
                      <td class="border-top">{{$clientes->ciudad }}</td>
                      <td class="border-top">{{$clientes->direccion }}</td>
                      <td class="border-top">{{$clientes->email }}</td>
                    </tr>
                  @endforeach
                @endif

            </tbody>
        </table>

    </main><!-- End Conten -->
</body>
</html>
