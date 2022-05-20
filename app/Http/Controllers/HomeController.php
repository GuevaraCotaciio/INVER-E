<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {

        $dia = date('Y-m-d');
        $Productos=DB::table('producto')
        ->select('id', 'nombre', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'duracion', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra')
        ->where('tipo_producto', 'Producido')
        ->where('estado_producto', 'Disponible')
        ->where('fecha_vencimiento','>','"'.$dia.'"')
        ->orderBy('id', 'asc')->paginate(4);

        //SELECT 'cantidad', SUM(cantidad) from producto WHERE tipo_producto = 'producido' AND estado_producto = 'Disponible';
        $CantidadProductos=DB::table('producto')->select('cantidad')->where('tipo_producto', 'Producido')->where('estado_producto', 'Disponible')->sum('cantidad');

        $CantidadClientes=DB::table('cliente')->count();

        //$CantidadPedidos=DB::table('pedido')->select('cantidad')->where('tipo_producto', 'Producido')->where('estado_producto', 'Disponible')->sum('cantidad');

        $CantidadUsuarios=DB::table('users')->count();


        //SELECT nombre, calibre_producto, SUM(cantidad) AS CantidadTotal from producto WHERE tipo_producto = 'Producido' AND estado_producto = 'Disponible' GROUP BY calibre_producto;
        //dd($CantidadProductos);
        return view('home', compact('Productos', 'CantidadProductos','CantidadClientes','CantidadUsuarios'));
    }


    public function pedidos()
    {
        $listClientes = [];
        return view('pedidos', compact('listClientes'));
    }

    public function config()
    {
        return view('configuracion');
    }




}
