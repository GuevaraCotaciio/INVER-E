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
            <div> <h4>Reporte general Productos vencidos </h4> </div>

        </div>

        {{-- <div class="row">
            <div> <p>Fecha Incial</p><span>2022-05-21</span> </div>
            <div> <p>Fecha Final</p><span>2022-05-21</span> </div>
        </div> --}}

        <table class="table" id="tablaclientes">
            <thead class="cabecera">
                <tr>
                  <th scope="col" class="border border-white table-primary">Nombre</th>
                  <th scope="col" class="border border-white table-primary">Descripción</th>
                  <th scope="col" class="border border-white table-primary">Proveedor</th>
                  <th scope="col" class="border border-white table-primary">Tipo</th>
                  <th scope="col" class="border border-white table-primary">Estado</th>
                  <th scope="col" class="border border-white table-primary">Caduco</th>
                  <th scope="col" class="border border-white table-primary">Cantidad</th>
                  <th scope="col" class="border border-white table-primary">Valor</th>
                  <th scope="col" class="border border-white table-primary">Total </th>
                </tr>
            </thead>
            <tbody class="cuerpo">
                @if(count($productosVencidos)<=0)
                  <tr>
                    <td colspan="10" class="text-danger"> No hay registros para el nombre solicitado</td>
                  </tr>
                @else
                  @foreach ($productosVencidos as $productos)
                    <tr>
                      <td class="border-top">{{$productos->nombre }}</td>
                      <td class="border-top">{{$productos->descripcion }}</td>
                      <td class="border-top">{{$productos->nombreproveedor }}</td>
                      <td class="border-top">{{$productos->clasificacion_producto }}</td>
                      <td class="border-top">{{$productos->estado_producto }}</td>
                      <td class="border-top">{{$productos->fecha_vencimiento }}</td>
                      <td class="border-top">{{$productos->cantidad }}</td>
                      <td class="border-top">{{$productos->valor_venta }}</td>
                      <td class="border-top">{{$productos->valor_venta * $productos->cantidad }}</td>
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
