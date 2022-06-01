<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedidos extends Model
{
    use HasFactory;
    protected $table ="factura";



    function ID_Producto(){
        try {
            $IDPedido = DB::table('pedido')->select('id')->max('id');
            return $IDPedido + 1;
        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al consultar el nuevo ID. | Detalles: ', $e);
        }
    }

    public function Guardar_pedido($datos, $idP, $estado){  //guardo los datos
        try{
            $producto = new Pedidos();
            $producto->id                      = $idP;
            $producto->id_proveedor            = $datos->IDproveedor;
            $producto->nombre                  = $datos->namep;
            $producto->descripcion             = $datos->Description;
            $producto->tipo_producto           = $datos->tipoProducto;
            $producto->calibre_producto        = $datos->calibre;
            $producto->clasificacion_producto  = $datos->tipoClase;
            $producto->cantidad                = $datos->cantidad;
            $producto->fecha_vencimiento       = $datos->fechaVencimiento;
            $producto->estado_producto         = $estado;
            $producto->peso_unitario           = $datos->pesoUnitario;
            $producto->unidad_medida           = $datos->unidadmedida;
            $producto->valor_venta             = $datos->precioventa;
            $producto->valor_compra            = $datos->preciocompra;
            $producto->imagen                  = $datos->imagen_producto;
            if ($datos->hasFile('imagen_producto')) {
                $producto->imagen     = $datos->file('imagen_producto')->store('public');
            }else{
                $producto->imagen     ="public/default.png";
            }
            $producto->save();
            return "Guardado";

        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al guardar la información del producto. | Detalles: ', $e);
        }
    }

    public function Actualizar_Pedido($datos, $idP, $estado){   // actualizo los datos
        try{
            $producto = new Pedidos();
            $producto->id                      = $idP;
            $producto->id_proveedor            = $datos->IDproveedor;
            $producto->nombre                  = $datos->namep;
            $producto->descripcion             = $datos->Description;
            $producto->tipo_producto           = $datos->tipoProducto;
            $producto->calibre_producto        = $datos->calibre;
            $producto->clasificacion_producto  = $datos->tipoClase;
            $producto->cantidad                = $datos->cantidad;
            $producto->fecha_vencimiento       = $datos->fechaVencimiento;
            $producto->estado_producto         = $estado;
            $producto->peso_unitario           = $datos->pesoUnitario;
            $producto->unidad_medida           = $datos->unidadmedida;
            $producto->valor_venta             = $datos->precioventa;
            $producto->valor_compra            = $datos->preciocompra;
            $producto->imagen                  = $datos->imagen_producto;
            if ($datos->hasFile('imagen_producto')) {
                $producto->imagen     = $datos->file('imagen_producto')->store('public');
            }else{
                $producto->imagen     ="public/default.png";
            }
            $producto->update();
            DB::commit();
            return "Actualizado";

        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al guardar la información del producto. | Detalles: ', $e);
        }
    }


    public function Eliminar_Pedido($id){

        try {
        $producto=Pedidos::findOrFail($id);
        $producto->estado_producto = "Vencido";
        $producto->update();
        DB::commit();
        return "Producto Vencido";

        } catch (\Exception $e) {
            DB::rollBack();  //si la transaccion anterior es nula
        }
    }


    public function Buscar_Pedido_ID($IdProducto){

        if (strlen($IdProducto) > 0) {
            $datosproducto=DB::table('proveedor')
            ->join('producto','producto.id_proveedor','=','proveedor.id')
            ->select('producto.id as idproducto', 'producto.nombre as nombre', 'proveedor.nombre as nombreproveedor', 'descripcion', 'tipo_producto', 'estado_producto', 'calibre_producto', 'clasificacion_producto', 'cantidad', 'fecha_vencimiento', 'peso_unitario', 'unidad_medida', 'valor_venta', 'valor_compra', 'imagen')
            ->where('estado_producto', 'Disponible')
            ->where('producto.id', '=', $IdProducto)->paginate(1);
            //  dd($datosproducto);
            return $datosproducto;
        }
    }

}
