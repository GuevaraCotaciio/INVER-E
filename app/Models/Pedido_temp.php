<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pedido_temp extends Model
{
    use HasFactory;
    protected $table ="facturatemp";


    function ID_Pedidotemp(){
        try {
            $IDPedido = DB::table('facturatemp')->select('id')->max('id');
            return $IDPedido + 1;
        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al consultar el nuevo ID. | Detalles: ', $e);
        }
    }

    public function Guardar_items($datos){  //guardo los datos
        try{

            $idp = intval(preg_replace('/[^0-9]+/', '', $datos->nombre_producto), 10);  //saco el numero de la cadena de texto
            $pedidos = new Pedido_temp();

            $pedidos->id                      = $pedidos->ID_Pedidotemp();
            $pedidos->numero_factura          = $datos->id_factura;
            $pedidos->id_cliente              = $datos->idUsuario;
            $pedidos->nombre_cliente          = $datos->NombreCliente;
            $pedidos->id_producto             = $idp;
            $pedidos->vendedor                = $datos->nombre_vendedor;
            $pedidos->cantidad                = $datos->cantidad_producto;
            $pedidos->valor                   = $pedidos->Buscar_ItemsValor($idp);
            $pedidos->descripcion             = $datos->observaciones;
            $pedidos->total                   = $datos->cantidad_producto * $pedidos->Buscar_ItemsValor($idp);
            $pedidos->fecha_entrega           = $datos->FechaEntrega;


            $pedidos->save();
            return "Guardados";

        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al guardar la información de los productos agregados. | Detalles: ', $e);
        }
    }


    public function Buscar_ItemsTemp(){

        $datosproducto=DB::table('producto')
        ->join('facturatemp', 'facturatemp.id_producto', '=', 'producto.id')
        ->select('facturatemp.id', 'facturatemp.numero_factura', 'facturatemp.id_cliente', 'facturatemp.id_producto', 'producto.nombre as nombre_producto', 'facturatemp.vendedor', 'facturatemp.cantidad', 'facturatemp.valor')->get();
        // dd($datosproducto);
        return $datosproducto;
    }


    public function Buscar_ItemsValor($id){

        $valorproducto=DB::table('producto')
        ->select('valor_venta')
        ->where('id', $id)->get();
        foreach ($valorproducto as $valor ) {
            // dd($valor->valor_venta);
            return $valor->valor_venta;
        }
    }


    public function Eliminar_facturaTEMP($idfactura){
        try {

            DB::table('facturatemp')
            ->select('*')
            ->where('numero_factura', $idfactura)
            ->delete();


            // DB::beginTransaction();
            // $Eliminarprdidotemp=Pedido_temp::findOrFail($idfactura);
            // $Eliminarprdidotemp->delete();
            // DB::commit();
            return "Eliminado";

        } catch (\Exception $e) {
            DB::rollBack();  //si la transaccion anterior es nula
        }
    }

}
