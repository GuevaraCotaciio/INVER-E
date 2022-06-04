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
            $pedidos = new Pedidos();

            $datoscliente = [];                                                         //
            $listaitem = [];                                                            // lista de items creados
            $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);        // lista de nombres de los clientes
            $idfactura = $factura->ID_Factura();                                        // ID DE LA FACTURA
            $listClientes = $persona->Lista_Personas_General("Cliente");                // lista de todos los clientes activos
            $listPedidos = $pedidos->Lista_Pedidos_General();                           // lista de todos los pedidos activos

            return view('pedidos', compact('datoscliente','nombreclientes', 'listClientes', 'listPedidos', 'listaitem', 'idfactura'));

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
        try {

            if ($request->GuardarProducto == "nuevoitem") {                 //  almacena informacion en tabla temporal

                $pedido_temp = new Pedido_temp();
                if ($pedidosT = $pedido_temp->Guardar_items($request) == "Guardados") {          //guardo los item temporalmente es esta tabla pedidostemp

                    $cliente = new Cliente();
                    $persona = new Persona();
                    $productos = new Producto();
                    $factura = new factura();
                    $pedidos = new Pedidos();

                    $listaitem = $pedido_temp->Buscar_ItemsTemp();                               // lista de items creados
                    $datoscliente = $cliente->Buscar_Cliente_pedidos($request->idUsuario);       //lista de cliente seleccionado
                    $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);         // lista de nombres de los clientes
                    $idfactura = $factura->ID_Factura();                                         // ID DE LA FACTURA
                    $listaProdctos = $productos->Buscar_Productos();                             // Lista de buscar productos

                    $listClientes = $persona->Lista_Personas_General("Cliente");                 // lista de todos los clientes activos
                    $listPedidos = $pedidos->Lista_Pedidos_General();                            // lista de todos los pedidos activos
                    echo "nuevo producto";

                    return view('pedidos', compact('datoscliente','nombreclientes', 'listClientes', 'listPedidos', 'listaitem', 'listaProdctos', 'idfactura'));

                }else{

                }

            }else if ($request->GuardarFactura == "crearfactura") {         // guarda todos los datos y crea la factura

                $factura = new factura();
                $pedido_temp = new Pedido_temp();

                $datosTemp=DB::table('facturatemp')                     // consulta datos de la tabla facturatemp
                ->select('id', 'numero_factura', 'id_cliente', 'id_producto', 'vendedor', 'cantidad', 'valor')->get();
                //dd($datosTemp);

                if (strlen($request->nombre_producto) > 0 &&  strlen($request->cantidad_producto) > 0 ) {       // validación si el ultimo campo de datos en el formulario tiene datos, si tiene los guarda

                   if (count($datosTemp) > 0) {            // Valida si hay datos guardados en tabla temp

                       if ($factura->Guardar_factura($request) == "Guardado") {    // guarda todos los datos y crea la factura

                           // $datosFac = DB::table('factura')                         // consulta datos de la tabla factura
                           // ->select('id', 'id_cliente', 'vendedor', 'fecha_entrega','descripcion', 'valor_total')->get();

                           $pedidos = new Pedidos();
                           foreach ($datosTemp as $DatosFactura) {                                                     // guarda todos los datos y crea el pedido
                               $pedidos->Guardar_pedido($DatosFactura->id_producto, $DatosFactura->numero_factura, $DatosFactura->cantidad);
                           }

                           $IDPRODUCT = intval(preg_replace('/[^0-9]+/', '', $request->nombre_producto), 10);  //saco el numero de la cadena de texto
                           if ($pedidos->Guardar_pedido($IDPRODUCT, $request->id_factura, $request->cantidad_producto) == "Guardado") {          //guarda el pedido y lo relaciona con la factura

                               if($pedido_temp->Eliminar_facturaTEMP($request->id_factura) == "Eliminado"){                        // elimina los datos de la tabla temporal
                                   return redirect()->route('pedidos.general')->with('fine','Pedido generado de forma exitosa!.');
                               }else{
                                   return redirect()->route('pedidos.general')->with('fail','Error al eliminar datos temporales!.');
                               }
                           }else {
                               return redirect()->route('pedidos.general')->with('fail','Error al guardar los datos del pedido!.');
                           }
                       }else{
                           return redirect()->route('pedidos.general')->with('fail','Error al guardar los datos de la factura.');
                       }


                   }else{                                  // si no tiene datos solo guarda lo que triga del formulario

                       if ($factura->Guardar_factura($request) == "Guardado") {    // guarda todos los datos y crea la factura

                           $pedidos = new Pedidos();
                           $IDPRODUCT = intval(preg_replace('/[^0-9]+/', '', $request->nombre_producto), 10);  //saco el numero de la cadena de texto
                           if ($pedidos->Guardar_pedido($IDPRODUCT, $request->id_factura, $request->cantidad_producto) == "Guardado") {          //guarda el pedido y lo relaciona con la factura
                               return redirect()->route('pedidos.general')->with('fine','Pedido generado de forma exitosa!.');
                           }else {
                               return redirect()->route('pedidos.general')->with('fail','Error al guardar los datos del pedido!.');
                           }
                       }else{
                           return back()->with('fail','Error al guardar los datos de la factura.');
                       }
                   }

                }else{                              // validación si el ultimo campo de datos en el formulario tiene datos, si no tiene no hace nada
                   if (count($datosTemp) > 0) {            // Valida si hay datos guardados en tabla temp

                       if ($factura->Guardar_factura($request) == "Guardado") {    // guarda todos los datos y crea la factura

                           $pedidos = new Pedidos();
                           foreach ($datosTemp as $DatosFactura) {                         // guarda todos los datos y crea el pedido y lo relaciona con la factura
                               $pedidos->Guardar_pedido($DatosFactura->id_producto, $DatosFactura->numero_factura, $DatosFactura->cantidad);
                           }

                           if ($pedido_temp->Eliminar_facturaTEMP($request->id_factura) == "Eliminado") {                        // elimina los datos de la tabla temporal
                               return redirect()->route('pedidos.general')->with('fine', 'Pedido generado de forma exitosa!.');
                           } else {
                               echo "fallo";
                           }
                       } else {
                           return back()->with('fail', 'Error  al intentar guardar los datos de la factura.');
                       }
                   }else{
                       return back();
                   }
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
