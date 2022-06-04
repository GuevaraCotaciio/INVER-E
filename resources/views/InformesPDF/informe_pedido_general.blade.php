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
            <div> <h4>Reporte general de pedidos </h4> </div>

        </div>

        {{-- <div class="row">
            <div> <p>Fecha Incial</p><span>2022-05-21</span> </div>
            <div> <p>Fecha Final</p><span>2022-05-21</span> </div>
        </div> --}}




        <table class="table" id="tablaclientes">
            <thead class="cabecera">
                <tr>
                    <th scope="col" class="border border-white table-primary">ID factura</th>
                    <th scope="col" class="border border-white table-primary">Cliente</th>
                    <th scope="col" class="border border-white table-primary">Vendedor</th>
                    <th scope="col" class="border border-white table-primary">Observaciones</th>
                    <th scope="col" class="border border-white table-primary">Fecha emisión</th>
                    <th scope="col" class="border border-white table-primary">Fecha entrega</th>
                    <th scope="col" class="border border-white table-primary">Total productos</th>
                    <th scope="col" class="border border-white table-primary">Valor total</th>
                  </tr>
            </thead>

            <tbody class="cuerpo">
                @if(count($listPedidos)<=0)
                  <tr>
                    <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                  </tr>
                @else
                  @foreach ($listPedidos as $pedidos)
                    <tr>
                      <td class="border-top">{{$pedidos->idfactura }}</td>
                      <td class="border-top">{{$pedidos->nombrecliente }}</td>
                      <td class="border-top">{{$pedidos->vendedor }}</td>
                      <td class="border-top">{{$pedidos->descripcion }}</td>
                      <td class="border-top">{{$pedidos->fecha_emision }}</td>
                      <td class="border-top">{{$pedidos->fecha_entrega }}</td>
                      <td class="border-top">{{$pedidos->cantidad }}</td>
                      <td class="border-top">{{$pedidos->total }}</td>
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
