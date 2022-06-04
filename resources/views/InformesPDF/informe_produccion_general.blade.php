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
            <div> <h4>Reporte general producción.</h4> </div>


        </div>
        <div> <h4>Lista de pedidos para producción.</h4> </div>

        {{-- <div class="row">
            <div> <p>Fecha Incial</p><span>2022-05-21</span> </div>
            <div> <p>Fecha Final</p><span>2022-05-21</span> </div>
        </div> --}}



        <table class="table" id="tablaclientes">
            <thead class="cabecera">
                <tr>
                    <th scope="col" class="border border-white table-primary">ID factura</th>
                    <th scope="col" class="border border-white table-primary">Cliente</th>
                    <th scope="col" class="border border-white table-primary">Observaciones</th>
                    <th scope="col" class="border border-white table-primary">Cantidad</th>
                    <th scope="col" class="border border-white table-primary">Tipo</th>
                    <th scope="col" class="border border-white table-primary">Fecha entrega</th>
                  </tr>
            </thead>

            <tbody class="cuerpo">
                {{$TotalProductos = 0}}
                {{$TotalProductos1 = 0}}
                {{$TotalProductos2 = 0}}
                {{$TotalProductos3 = 0}}
                @if(count($listPedidos)<=0)
                  <tr>
                    <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                  </tr>
                @else
                  @foreach ($listPedidos as $pedidos)
                    <tr>
                      <td class="border-top">{{$pedidos->numeropedido }}</td>
                      <td class="border-top">{{$pedidos->nombre_cliente }}</td>
                      <td class="border-top">{{$pedidos->descripcion }}</td>
                      <td class="border-top">{{$pedidos->cantidad }}</td>
                      <td class="border-top">{{$pedidos->tipoproducto }}</td>
                      <td class="border-top">{{$pedidos->fecha_entrega }}</td>
                    </tr>
                    {{$TotalProductos += $pedidos->cantidad}}
                    @if ($pedidos->tipoproducto == "Calibre #8")
                    {{$TotalProductos1 += $pedidos->cantidad}}
                    @elseif ($pedidos->tipoproducto == "Calibre #10")
                    {{$TotalProductos2 += $pedidos->cantidad}}
                    @elseif ($pedidos->tipoproducto == "Calibre #12")
                    {{$TotalProductos3 += $pedidos->cantidad}}
                    @endif
                  @endforeach
                @endif
            </tbody>
        </table>

        <div class="row">
            <br><hr>
            <div>
                <h5>Total productos calibre #8 a realizar. <span>{{$TotalProductos1}}</span></h5>
                <h5>Total productos calibre #10 a realizar. <span>{{$TotalProductos2}}</span></h5>
                <h5>Total productos calibre #12 a realizar. <span>{{$TotalProductos3}}</span></h5>
            </div><br>
            <div> <h4>Total productos: {{$TotalProductos}} </h4>  </div>
        </div>
{{--
        <footer class="final">
            <hr>
            <span>Inver-E 2022</span>
        </footer> --}}

    </main><!-- End Conten -->
</body>
</html>
