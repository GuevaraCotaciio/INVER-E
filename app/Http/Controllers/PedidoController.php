<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
            $datoscliente = [];
            $listaitem = [];             // lista de items creados
            $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);        // lista de nombres de los clientes
            $listClientes = $persona->Lista_Personas_General("Cliente");                // lista de clientes activos
            return view('pedidos', compact('datoscliente','nombreclientes', 'listClientes', 'listaitem'));

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

                    $listaitem = $pedido_temp->Buscar_ItemsTemp();                               // lista de items creados
                    // dd($listaitem);
                    $datoscliente = $cliente->Buscar_Cliente_pedidos($request->idUsuario);       //lista de cliente seleccionado
                    $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);         // lista de nombres de los clientes
                    $listClientes = $persona->Lista_Personas_General("Cliente");                 // lista de clientes activos
                    $listaProdctos = $productos->Buscar_Productos();
                    echo "nuevo producto";
                    return view('pedidos', compact('datoscliente','nombreclientes', 'listClientes', 'listaitem', 'listaProdctos'));

                }else{

                }

            }else if ($request->GuardarFactura == "crearfactura") {   // guarda todos los fatos y crea la factura

                echo "Factura guardada";

            }



            // $pedido = new Pedidos();
            // $idPedido = $pedido->ID_Producto();
            // $estadop = "Disponible";
            // if( $pedido->Guardar_Producto($request, $idPedido, $estadop) == "Guardado"){
            //     return redirect()->route('productos.general')->with('fine','Producto guardado exitosamente.');
            // }else{
            //     return back()->with('fail',' Fallo al guardar el producto.');
            // }

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
