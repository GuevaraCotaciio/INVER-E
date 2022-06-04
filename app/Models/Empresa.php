<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Empresa extends Model
{
    use HasFactory;
    protected $table ="empresa";



    public function Guardar_empresa($datos){

        try {

            $empresa= new Empresa();
            $empresa->nombre            = $datos->Nombre_E;
            $empresa->tipo_empresa      = $datos->tipoE;
            $empresa->descripcion       = $datos->description;
            $empresa->ciudad            = $datos->Ciudad;
            $empresa->direccion         = $datos->address;
            $empresa->telefono          = $datos->phone;
            $empresa->email             = $datos->email;
            $empresa->facebook          = $datos->facebook;
            $empresa->instagram         = $datos->instagram;
            $empresa->whatsapp          = $datos->whatsapp;

            if ($datos->hasFile('archivo')) {
                $empresa->imagen        = $datos->file('archivo')->store('public');
            }else{
                $empresa->imagen        = "public/default.png";
            }
            // dd($empresa);
            $empresa->save();

            return "Guardado";

            } catch (\Exception $e) {
                // DB::rollBack();  //si la transaccion anterior es nula
                return "Fallo";
            }
    }


    public function Actualizar_empresa($datos, $Id){

        try {

            $empresa=Empresa::findOrFail($Id);
            $empresa->nombre            = $datos->Nombre_E;
            $empresa->tipo_empresa      = $datos->tipoE;
            $empresa->descripcion       = $datos->description;
            $empresa->ciudad            = $datos->Ciudad;
            $empresa->direccion         = $datos->address;
            $empresa->telefono          = $datos->phone;
            $empresa->email             = $datos->email;
            $empresa->facebook          = $datos->facebook;
            $empresa->instagram         = $datos->instagram;
            $empresa->whatsapp          = $datos->whatsapp;

            if ($datos->hasFile('archivo')) {
                $empresa->imagen        = $datos->file('archivo')->store('public');
            }else{
                $empresa->imagen        = $empresa->imagen;
            }
            // dd($empresa);
            $empresa->update();

            return "Actualizado";

            } catch (\Exception $e) {
                // DB::rollBack();  //si la transaccion anterior es nula
                return "Fallo";
            }
    }
}
