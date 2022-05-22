<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('styles/style_reportes.css') }}" type="text/css">
    <title>Inver-E / Reportes</title>
</head>
<body>


    <!-- ======= Contendor Principal  ======= -->
    <main class="report">

        <div class="row">
            <div> <img src="{{ public_path('images/logo.png') }}" width="60px"> </div>
            <div> <h4>Reporte general clientes </h4> </div>

        </div>

        {{-- <div class="row">
            <div> <p>Fecha Incial</p><span>2022-05-21</span> </div>
            <div> <p>Fecha Final</p><span>2022-05-21</span> </div>
        </div> --}}

        <table class="table" id="tablaclientes">
            <thead class="cabecera">
                <tr>
                  <th scope="col" class="border border-white table-primary">Nombre</th>
                  <th scope="col" class="border border-white table-primary">Genero</th>
                  <th scope="col" class="border border-white table-primary">Edad</th>
                  <th scope="col" class="border border-white table-primary">Teléfono</th>
                  <th scope="col" class="border border-white table-primary">Ciudad</th>
                  <th scope="col" class="border border-white table-primary">Dirección</th>
                  <th scope="col" class="border border-white table-primary">E-mail</th>
                  <th scope="col" class="border border-white table-primary">Cant Pedidos</th>
                  <th scope="col" class="border border-white table-primary">Total Pedidos</th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @if(count($listClientes)<=0)
                  <tr>
                    <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                  </tr>
                @else
                  @foreach ($listClientes as $clientes)
                    <tr>
                      <td class="border-top">{{$clientes->nombre }} {{$clientes->apellido }}</td>
                      <td class="border-top">{{$clientes->genero }}</td>
                      <td class="border-top">{{$clientes->fecha_nacimiento }}</td>
                      <td class="border-top">{{$clientes->telefono }}</td>
                      <td class="border-top">{{$clientes->ciudad }}</td>
                      <td class="border-top">{{$clientes->direccion }}</td>
                      <td class="border-top">{{$clientes->email }}</td>
                      <td class="border-top">{{$clientes->documento }}</td>
                      <td class="border-top">{{$clientes->documento }}</td>
                    </tr>
                  @endforeach
                @endif

            </tbody>
        </table>
{{--
        <footer class="final">
            <hr>
            <span>Inver-E 2022</span>
        </footer> --}}

    </main><!-- End Conten -->
</body>
</html>
