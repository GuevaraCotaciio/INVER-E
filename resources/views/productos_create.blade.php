<head>
    <title>Inver-E / Productos-crear</title>
</head>
<!-- ======= Header ======= -->
  @include('Templates.nav')
  <!-- End Header -->

   <!-- ======= Content  ======= -->
  <main class="col-12 ps-1 pb-3" style="background-color: #e8edf4;">

    <!-- Tirulos modulos-->
    <div class="pagetitle ps-4">
      <h1>Productos</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
          <li class="breadcrumb-item"><a href="{{ route('productos.general') }}">Productos</a></li>
          <li class="breadcrumb-item active">Nuevo</li>
        </ol>
      </nav>
    </div>

    <div class="card ms-2 me-3">
      <div class="card-body m-4">
        <h4 class="card-title mb-3">Crear nuevo Producto</h4>

        <!-- ======== Formulario General ======== -->
        <form action="{{ route('productos.save') }}" method="POST" enctype="multipart/form-data">
          @csrf

          <div class="row col-lg-12 pe-0">

            <div class="col-lg-2">  <!-- foto del clinte -->

                <div class="card p-0 border-0">
                    <img class="border-0" src="/public/default.png" alt="Imagen" style="height: 110px;">
                </div>

                <div class="card-body ps-0">
                    <div class="input-group ">
                        <div class="custom-file me-2">
                            <input type="file" hidden  class="custom-file-input" id="inputFile" name="imagen_producto">
                            <a class="btn btn-success" title="Cargar nueva imagen" name="imagen">
                                <label class="custom-file-label" for="inputFile"><i class="bi bi-upload"></i></label>
                            </a>

                        </div>
                        <button type="reset" class="btn btn-danger" title="Eliminar la imagen"><i class="bi bi-trash"></i></button>
                    </div>
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-2 col-form-label">Nombre</label>
            <div class="col-10">
                <input type="text" name="namep" class="form-control form-control-lg" placeholder="* Producto">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-2 col-form-label">Descripción</label>
            <div class="col-10">
                <input type="text" name="Description" class="form-control form-control-lg" placeholder=" Descripción corta">
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputText" class="col-2 col-form-label">Tipo de Producto</label>

            <div class="col-10">
              <div class="input-group">
                <select class="form-select form-select-lg" name="tipoProducto">
                  <option selected>Seleccione el tipo</option>
                  <option value="Producido">Producido</option>
                  <option value="Adquirido">Adquirido</option>
                </select>

                <select class="form-select form-select-lg" name="tipoClase">
                  <option selected>Seleccione la clase </option>
                  <option value="Carne">Carne</option>
                  <option value="Condimentos">Condimentos</option>
                  <option value="Implementos">Implementos</option>
                  <option value="Chorizos">Chorizos</option>
                </select>
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <label class="col-sm-2 col-form-label">Calibre</label>
            <div class="col-sm-10">
              <select class="form-select form-select-lg" name="calibre">
                <option selected>Selecciona el calibre</option>
                <option value="Calibre #8">Calibre #8</option>
                <option value="Calibre #10">Calibre #10</option>
                <option value="Calibre #12">Calibre #12</option>
              </select>
            </div>
          </div>

          <div class="row mb-3">
                <label for="number" class="col-sm-2 col-form-label">Cantidad</label>
                <div class=" col-sm-10">
                        <input type="number" class="form-control form-control-lg" name="cantidad" placeholder="* Cantidad del producto">
                </div>
          </div>


          <div class="row mb-3">
            <label for="inputEmail" class="col-sm-2 col-form-label">Proveedor</label>
            <div class="col-sm-10 ">
              <input type="text" class="form-control form-control-lg" name="IDproveedor" placeholder="Nombre Proveedor">
            </div>
          </div>


          <div class="row mb-3">
            <label for="inputcity" class="col-sm-2 col-form-label">Fecha Vencimiento</label>
            <div class="col-sm-10">
              <input type="date" class="form-control form-control-lg" name="fechaVencimiento">
            </div>
          </div>


          <div class="row mb-3">
            <label for="number" class="col-sm-2 col-form-label">Peso Unitario</label>
            <div class=" row col-sm-10">
                <div class="col-lg-7">
                    <div class="input-group">
                        <div class="input-group-text" > Cantidad </div>
                        <input type="text" class="form-control form-control-lg" name="pesoUnitario" placeholder="* peso por unidad">
                    </div>
                </div>
              <div class="row col-lg-5 pt-2">
                <div class="form-check col-lg-4">
                    <input class="form-check-input" type="radio" name="unidadmedida" id="gramos" value="Gramos" >
                    <label class="form-check-label" for="gramos">Gramos</label>
                </div>
                <div class="form-check col-lg-4">
                    <input class="form-check-input" type="radio" name="unidadmedida" id="libras" value="Libras" >
                    <label class="form-check-label" for="libras">Libras</label>
                </div>
                <div class="form-check col-lg-4">
                    <input class="form-check-input" type="radio" name="unidadmedida" id="kilos" value="Kilos" >
                    <label class="form-check-label" for="kilos">Kilos</label>
                </div>
                </div>
            </div>
          </div>



          <div class="row mb-3">
            <label for="inputadress" class="col-sm-2 col-form-label">Precio Producto</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-text"> $ Pesos </div>
                    <input type="number" class="form-control form-control-lg" name="preciocompra" placeholder="precio del producto comprado">
                </div>
            </div>
          </div>

          <div class="row mb-3">
            <label for="inputadress" class="col-sm-2 col-form-label">Precio comercial</label>
            <div class="col-sm-10">
                <div class="input-group">
                    <div class="input-group-text"> $ Pesos </div>
                    <input type="number" class="form-control form-control-lg" name="precioventa" placeholder="Precio de venta del producto">
                </div>
            </div>
          </div>


          <!-- Envio Formulario -->
          <div class="row  pt-3 pb-3 col-sm-12 align-items-center justify-content-center">
            <div class="col-4"></div>
            <div class="col-2">
              <button type="submit" class="btn btn-success btn-lg ">Guardar</button>
            </div>
            <div class="col-2">
              <a href="{{ route('productos.general') }}" class="btn btn-info btn-lg  muted">Cancelar</a>
            </div>
            <div class="col-4"></div>
          </div>


        </form>

      </div>
    </div>
  </main>


  <!-- ======= Footer ======= -->
  @include('Templates.footer')
