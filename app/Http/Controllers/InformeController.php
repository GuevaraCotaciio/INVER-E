<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InformeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function informes_index()
    {
        return view('informes_general');
    }


    public function informes_clientes() //vista
    {
        //información general de clientes
        $InfoClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->paginate(5);
        //return view('informes_clientes', compact('InfoClientes'));

        //información pedidos por cliente
        $PedidosClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->paginate(5);
        //return view('informes_clientes', compact('PedidosClientes'));

        //información tipo producto por clientes
        $ProductoClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->paginate(5);

        return view('informes_clientes', compact('InfoClientes','PedidosClientes','ProductoClientes'));
    }

    public function informePDF_clientes() //vista
    {
        $listClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->get();
        //dd($listClientes);

        //Genero el PDF
        $pdr =PDF::setOptions([ 'dpi' => 150 , 'defaultFont' => 'verdana' ])->setPaper('a4', 'landscape')->setWarnings(false); //perzonalizo
        $pdf = PDF::loadview('InformesPDF/informe_cliente_general',compact('listClientes')); //creo el PDF
        return $pdf->stream();  //Retorno el PDF
    }





    public function informes_productos() //vista
    {
        //información general de clientes
        $productosVencidos=DB::table('proveedor')
        ->join('producto','producto.id_proveedor','=','proveedor.id')
        ->select('producto.id as idproducto', 'producto.nombre as nombre', 'proveedor.nombre as nombreproveedor', 'descripcion', 'tipo_producto', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'unidad_medida', 'valor_venta', 'valor_compra', 'imagen')
        ->where('estado_producto', 'Vencido')->get();
        //return view('informes_clientes', compact('InfoClientes'));

        //información pedidos por cliente
        $ProductosAlmacenados=DB::table('proveedor')
        ->join('producto','producto.id_proveedor','=','proveedor.id')
        ->select('producto.id as idproducto', 'producto.nombre as nombre', 'proveedor.nombre as nombreproveedor', 'descripcion', 'tipo_producto', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'unidad_medida', 'valor_venta', 'valor_compra', 'imagen')
        ->where('estado_producto', 'Disponible')->get();
        //return view('informes_clientes', compact('PedidosClientes'));

        return view('informes_productos', compact('productosVencidos','ProductosAlmacenados'));
    }

    public function InformePDF_ProductosVencidos() //vista
    {
        $productosVencidos=DB::table('proveedor')
        ->join('producto','producto.id_proveedor','=','proveedor.id')
        ->select('producto.id as idproducto', 'producto.nombre as nombre', 'proveedor.nombre as nombreproveedor', 'descripcion', 'tipo_producto', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'unidad_medida', 'valor_venta', 'valor_compra', 'imagen')
        ->where('estado_producto', 'Vencido')->get();
        //dd($listClientes);

        //Genero el PDF
        $pdr =PDF::setOptions([ 'dpi' => 150 , 'defaultFont' => 'verdana' ])->setPaper('a4', 'landscape')->setWarnings(false); //perzonalizo
        $pdf = PDF::loadview('InformesPDF/informe_producto_vencido',compact('productosVencidos')); //creo el PDF
        return $pdf->stream();  //Retorno el PDF
    }

    public function InformePDF_ProductosDisponibles() //vista
    {
        $productosDisponibles=DB::table('proveedor')
        ->join('producto','producto.id_proveedor','=','proveedor.id')
        ->select('producto.id as idproducto', 'producto.nombre as nombre', 'proveedor.nombre as nombreproveedor', 'descripcion', 'tipo_producto', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'unidad_medida', 'valor_venta', 'valor_compra', 'imagen')
        ->where('estado_producto', 'Disponible')->get();
        //dd($listClientes);

        //Genero el PDF
        $pdr =PDF::setOptions([ 'dpi' => 150 , 'defaultFont' => 'verdana' ])->setPaper('a4', 'landscape')->setWarnings(false); //perzonalizo
        $pdf = PDF::loadview('InformesPDF/informe_producto_disponible',compact('productosDisponibles')); //creo el PDF
        return $pdf->stream();  //Retorno el PDF
    }

}
