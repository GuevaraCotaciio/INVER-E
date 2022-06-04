<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class factura extends Model
{
    use HasFactory;
    protected $table ="factura";



    public function ID_Factura(){
        try {
            $IDfactura = DB::table('factura')->select('id')->max('id');
            return $IDfactura + 1;
        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al consultar el nuevo ID. | Detalles: ', $e);
        }
    }


    public function Guardar_factura($datos){

        // if (count($datos) > 0) {
            $factura = new factura();      // guarda los datos en la tabla factura
            $factura->id                 = $factura->ID_Factura();
            $factura->id_cliente         = $datos->idUsuario;
            $factura->nombre_cliente     = $datos->NombreCliente;
            $factura->vendedor           = $datos->nombre_vendedor;
            $factura->fecha_emision	     = $datos->fecha_emision;
            $factura->fecha_entrega      = $datos->FechaEntrega;
            $factura->descripcion        = $datos->observaciones;
            $factura->valor_total        = $datos->total;   //sacarlo desde una consulta para tomar los valores y sumarlos

            $factura->save();
            return "Guardado";
        // }
    }


}
