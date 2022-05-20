<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
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
            $nombreclientes = $cliente->Buscar_Cliente($request->NombreCliente);        // lista de nombres de los clientes
            $listClientes = $persona->Lista_Personas_General("Cliente");                // lista de clientes activos
            return view('pedidos', compact('datoscliente','nombreclientes', 'listClientes'));

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


}
