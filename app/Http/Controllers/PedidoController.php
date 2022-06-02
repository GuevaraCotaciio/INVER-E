<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\factura;
use App\Models\Pedido_temp;
use App\Models\Pedidos;
use App\Models\Persona;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function pedidos_index(Request $request)
    {
            $cliente = new Cliente();
            $persona = new Persona();
            $factura = new factura();

            $datoscliente = [];                                                         //
            $listaitem = [];                                                            // lista de items creados
            $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);        // lista de nombres de los clientes
            $listClientes = $persona->Lista_Personas_General("Cliente");                // lista de clientes activos
            $idfactura = $factura->ID_Factura();                                        // ID DE LA FACTURA
            return view('pedidos', compact('datoscliente','nombreclientes', 'listClientes', 'listaitem', 'idfactura'));

    }


    public function pedidos_show(Request $request) //vista princpial y form de lectura
    {
       if(isset($request)){
        $FindhText=trim($request->get('Buscar_cliente'));

            if (strlen($FindhText)<=0) {
                $listClientes=DB::table('persona')
                ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'edad', 'telefono', 'ciudad', 'direccion', 'email')
                ->where('tipo_persona', 'Cliente')
                ->orderBy('id', 'asc')->paginate(10);
                return view('clientes_general', compact('listClientes', 'FindhText'));
            }else{
                $listClientes=DB::table('persona')
                ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'edad', 'telefono', 'ciudad', 'direccion', 'email')
                ->where('nombre', 'like', '%'.$FindhText.'%')
                ->Where('tipo_persona', 'Cliente')
                ->orderBy('id', 'asc')->paginate(10);
                return view('clientes_general', compact('listClientes', 'FindhText'));
            }
        }
    }



    public function pedidos_save(Request $request){
            //  dd($request);
        try {

            if ($request->GuardarProducto == "nuevoitem") {   //  almacena informacion en tabla temporal

                $pedido_temp = new Pedido_temp();
                if ($pedidosT = $pedido_temp->Guardar_items($request) == "Guardados") {

                    $cliente = new Cliente();
                    $persona = new Persona();
                    $productos = new Producto();
                    $factura = new factura();

                    $listaitem = $pedido_temp->Buscar_ItemsTemp();                               // lista de items creados
                    $datoscliente = $cliente->Buscar_Cliente_pedidos($request->idUsuario);       //lista de cliente seleccionado
                    $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);         // lista de nombres de los clientes
                    $listClientes = $persona->Lista_Personas_General("Cliente");                 // lista de clientes activos
                    $idfactura = $factura->ID_Factura();                                         // ID DE LA FACTURA
                    $listaProdctos = $productos->Buscar_Productos();                             // Lista de buscar productos
                    echo "nuevo producto";
                    return view('pedidos', compact('datoscliente','nombreclientes', 'listClientes', 'listaitem', 'listaProdctos', 'idfactura'));

                }else{

                }

            }else if ($request->GuardarFactura == "crearfactura") {         // guarda todos los datos y crea la factura

                $factura = new factura();
                if ($factura->Guardar_factura($request) == "Guardado") {    // guarda todos los datos y crea la factura


                    $datosTemp=DB::table('facturatemp')                     // consulta datos de la tabla facturatemp
                    ->select('id', 'numero_factura', 'id_cliente', 'id_producto', 'vendedor', 'cantidad', 'valor')->get();
                    // dd($datosTemp);

                    $datosFac = DB::table('factura')                         // consulta datos de la tabla factura
                    ->select('id', 'id_cliente', 'vendedor', 'fecha_entrega')->get();

                    if (strlen($request->nombre_producto) > 0 &&  strlen($request->cantidad_producto) > 0 ) {      // validación si el ultimo campo tiene datos o no

                        $pedidos = new Pedidos();                               // guarda todos los datos y crea el pedido

                        foreach ($datosTemp as $DatosFactura) {
                            $pedidos->Guardar_pedido($DatosFactura->id_producto, $DatosFactura->numero_factura, $DatosFactura->cantidad);
                        }

                        $IDPRODUCT = intval(preg_replace('/[^0-9]+/', '', $request->nombre_producto), 10);  //saco el numero de la cadena de texto
                        if ($pedidos->Guardar_pedido($IDPRODUCT, $request->id_factura, $request->cantidad_producto) == "Guardado") {
                            return redirect()->route('pedidos.general')->with('fine','Producto guardado exitosamente.');
                        }else {
                            echo "fallo";
                        }

                    }else{

                        $pedidos = new Pedidos();                               // guarda todos los datos y crea el pedido
                        foreach ($datosTemp as $DatosFactura) {
                            $pedidos->Guardar_pedido($DatosFactura->id_producto, $DatosFactura->numero_factura, $DatosFactura->cantidad);
                        }
                        return redirect()->route('pedidos.general')->with('fine','Producto guardado exitosamente.');

                    }

                }else{
                    return back()->with('fail','Error  al intentar guardar los datos de la factura.');
                }

            }

        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Fallo  general al guardar la información del cliente.  |  Detalles: ', $e);
        }
    }


    public function pedidos_edit(Request $request){

        try {

            $producto = new Producto();
            $idProducto = $producto->ID_Producto();
            $estadop = "Disponible";
            if( $producto->Guardar_Producto($request, $idProducto, $estadop) == "Guardado"){
                return redirect()->route('productos.general')->with('fine','Producto guardado exitosamente.');
            }else{
                return back()->with('fail',' Fallo al guardar el producto.');
            }

        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Fallo  general al guardar la información del cliente.  |  Detalles: ', $e);
        }

    }


    public function pedidos_destroy(Request $request){

        try {

            $producto = new Producto();
            $idProducto = $producto->ID_Producto();
            $estadop = "Disponible";
            if( $producto->Guardar_Producto($request, $idProducto, $estadop) == "Guardado"){
                return redirect()->route('productos.general')->with('fine','Producto guardado exitosamente.');
            }else{
                return back()->with('fail',' Fallo al guardar el producto.');
            }

        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Fallo  general al guardar la información del cliente.  |  Detalles: ', $e);
        }

    }



}
