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
        ->select('id', 'nombre', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra')
        ->where('tipo_producto', 'Producido')
        ->where('estado_producto', 'Disponible')
        ->orderBy('id', 'asc')->paginate(5);

        // Producto Vencidos
        $ProductosVencidos=DB::table('producto')
        ->select('id', 'nombre', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra')
        ->where('tipo_producto', 'Producido')
        ->where('estado_producto', 'Vencido')
        ->orderBy('id', 'asc')->paginate(5);


        // productos Proximos a vencer Producidos
        $dia = date('Y-m-d');
        $ProductosPorVencer=DB::table('producto')
        ->select('id', 'nombre', 'descripcion', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra', 'imagen')
        ->where('tipo_producto', 'Producido')
        ->where('estado_producto', 'Disponible')
        ->where('fecha_vencimiento','>','"'.$dia.'"')
        ->orderBy('id', 'asc')->paginate(5);
        //productos Proximos a vencer Adquiridos
        //dd($ProductosPorVencer);

        return view('productos_general', compact('ProductosDisponibles','ProductosVencidos','ProductosPorVencer'));

    }

    public function productos_create()
    {
        return view('productos_create');
    }
    public function productos_save(Request $request)
    {
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


    public function productos_update($idproducto) //Vista y datos del form de actualizar datos
    {
        $producto = new Producto();
        $datosproducto = $producto->Buscar_Producto_ID($idproducto);
        return view('productos_update', compact('datosproducto'));
    }


    public function productos_edit(Request $request, $idp) //ruta de actualizar datos
    {
        $producto = new Producto();
        $estadop = "Disponible";
        // dd($request);
        if($producto->Actualizar_Producto($request, $idp, $estadop) == "Actualizado"){

            return redirect()->route('productos.general')->with('fine','Producto actualizado correctamente.');
        }else{
            return back()->with('fail','Ha ocurrido un error al actualizar la información del producto.');
        }

    }


    public function productos_destroy($id) //Funcion de eliminar datos
    {
        $producto = new Producto();
        if($producto->Eliminar_Producto($id) == "Producto Vencido"){
            return redirect()->route('productos.general')->with('fine','El producto fue eliminado.');
        }else{
            return back()->with('fail','Ha ocurrido un error al eliminar el producto.');
        }
    }



    public function productos_list() //Vista y form de visualizar datos
    {
        $productosproducidos=DB::table('producto')
        ->select('id', 'nombre', 'descripcion', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'valor_venta', 'valor_compra', 'imagen')
        ->where('estado_producto', 'Disponible')
        ->orderBy('id', 'asc')->paginate(10);

        return view('productos_option', compact('productosproducidos'));
    }

    public function productos_show(Producto $producto ) //Vista y form de visualizar datos
    {

        return view('productos_detalle', compact('producto'));
    }


}
