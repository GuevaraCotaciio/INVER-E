<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Extension\Table\Table;

class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function productos_index() //vista princpial y form de lectura
    {
        // Productos Disponibles
        $ProductosDisponibles=DB::table('producto')
        ->select('id', 'nombre', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'duracion', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra')
        ->where('tipo_producto', 'Producido')
        ->where('estado_producto', 'Disponible')
        ->orderBy('id', 'asc')->paginate(10);

        // Producto Vencidos
        $ProductosVencidos=DB::table('producto')
        ->select('id', 'nombre', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'duracion', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra')
        ->where('tipo_producto', 'Producido')
        ->where('estado_producto', 'Vencido')
        ->orderBy('id', 'asc')->paginate(10);


        // productos Proximos a vencer Producidos
        $dia = date('Y-m-d');
        $ProductosPorVencer=DB::table('producto')
        ->select('id', 'nombre', 'descripcion', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'duracion', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra', 'imagen')
        ->where('tipo_producto', 'Producido')
        ->where('estado_producto', 'Disponible')
        ->where('fecha_vencimiento','>','"'.$dia.'"')
        ->orderBy('id', 'asc')->paginate(4);
        //productos Proximos a vencer Adquiridos
        //dd($ProductosPorVencer);

        return view('productos_general', compact('ProductosDisponibles','ProductosVencidos','ProductosPorVencer'));

    }

    public function productos_create()
    {
        return view('productos_create');
    }
    public function productos_save()
    {
        return view('');
    }




    public function productos_show() //Vista y form de visualizar datos
    {
        $productosproducidos=DB::table('producto')
        ->select('id', 'nombre', 'descripcion', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'duracion', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra')
        ->where('estado_producto', 'Disponible')
        ->orderBy('id', 'asc')->paginate(10);

        return view('productos_option', compact('productosproducidos'));
    }

}
