<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\factura;
use App\Models\Persona;
use App\Models\Producto;
use App\Models\Pedidos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Extension\Table\Table;
use mysqli;

class ClienteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function clientes_index(Request $request) //vista princpial y form de lectura
    {
        $Cliente = new Persona();
        if (strlen(trim($request->get('Buscar_cliente')))<=0) {
            $listClientes = $Cliente->Lista_Personas_General("Cliente");
        }else{
            $listClientes = $Cliente->Buscar_Personas(trim($request->get('Buscar_cliente')), "Cliente");
        }
        return view('clientes_general', compact('listClientes'));

    }


    public function clientes_create() //vista y form de guardar datos
    {
        return view('clientes_create');
    }

    public function clientes_save(Request $request) //ruta de guardar datos
    {
        try {
            $persona = new Persona();
            $cliente = new Cliente();

            if($persona->Valida_Persona($request->document) == 'Cliente ya existe'){
                return back()->with('fail',' El cliente ya existe, intente nuevamente.');
            }else{
                $idPersona = $persona->ID_Persona();
                $idu = null;
                if( $persona->Guardar_Persona($request, $idPersona, $idu) == "Guardado"){
                    if($cliente->Guardar_Cliente($idPersona) == "Guardado"){
                        return redirect()->route('clientes_general')->with('fine','Cliente guardado exitosamente.');
                    }else{
                        return back()->with('fail',' Fallo al guardar el cliente.');
                    }
                }else{
                    return back()->with('fail',' Error al guardar la información del cliente.');
                }
            }
        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Fallo  general al guardar la información del cliente.  |  Detalles: ', $e);
        }
    }


    public function clientes_update($idcliente) //Vista y datos del form de actualizar datos
    {
        $persona = new Persona();
        $datoscliente = $persona->Buscar_Persona_ID($idcliente, "Cliente");
        return view('clientes_update', compact('datoscliente'));
    }

    public function clientes_edit(Request $request, $idp) //ruta de actualizar datos
    {
        $persona = new Persona();
        $cliente = new Cliente();
        // dd($request);
        if($persona->Actualizar_Persona($request, $idp) == "Actualizado"){

            if ($cliente->Actualizar_Cliente($request->IDCliente, $request->TipCliente) == "Actualizado") {
                return redirect()->route('clientes_general')->with('fine','Cliente actualizado correctamente.');
            }else{
                return back()->with('fail','Ha ocurrido un error al actualizar el cliente.');
            }
        }else{
            return back()->with('fail','Ha ocurrido un error al guardar la información del cliente.');
        }
    }


    public function clientes_show(persona $cliente) //Vista y form de visualizar datos
    {
        //dd($cliente);
        return view('clientes_option', compact('cliente'));
    }


    public function clientes_destroy($id) //Funcion de eliminar datos
    {
        $cliente = new Cliente();
        if($cliente->Eliminar_Cliente($id) == "Inactivado"){
            return redirect()->route('clientes_general')->with('fine','Cliente eliminado.');
        }else{
            return back()->with('fail','Ha ocurrido un error al eliminar el cliente.');
        }
    }


    public function clientes_buscar(Request $request)
    {
        $persona = new Cliente();
        $nombreclientes = $persona->Buscar_Cliente($request->NombreCliente);
        // dd($nombreclientes);
        return view('pedidos', compact('nombreclientes'));

    }


    public function clientes_buscar_pedidos(Request $request)
    {
        $cliente = new Cliente();
        $persona = new Persona();
        $productos = new Producto();
        $pedidos = new Pedidos();
        $factura = new factura();


        $idcliente = substr($request->NombreCliente, 0, 1);                          //se estrae solo el id del cliente
        $listaitem = [];
        $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);         // lista de nombres de los clientes
        $datoscliente = $cliente->Buscar_Cliente_pedidos($idcliente);                // datos del cliente seleccionado

        $idfactura = $factura->ID_Factura();                                         // ID DE LA FACTURA
        $listaProdctos = $productos->Buscar_Productos();                             //

        $listClientes = $persona->Lista_Personas_General("Cliente");                 // lista de todos los clientes activos
        $listPedidos = $pedidos->Lista_Pedidos_General();                            // lista de todos los pedidos activos
        return view('pedidos', compact('nombreclientes', 'datoscliente', 'listClientes', 'listPedidos', 'listaProdctos', 'listaitem', 'idfactura'));

    }

}
