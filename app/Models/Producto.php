<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table ="producto";


    public function Guardar_Producto($datos, $idPersona, $iduser){  //guardo los datos
        try{
            $persona = new persona();
            $persona->id             = $idPersona;
            $persona->id_usuario     = $iduser;
            $persona->nombre         = $datos->name;
            $persona->apellido       = $datos->lastname;
            $persona->tipo_documento = $datos->tipoDoc;
            $persona->documento      = $datos->document;
            $persona->genero         = $datos->genero;
            $persona->fecha_nacimiento = $datos->age;
            $persona->telefono       = $datos->phone;
            $persona->ciudad         = $datos->city;
            $persona->direccion      = $datos->adress;
            $persona->email          = $datos->email;
            $persona->tipo_persona   = $datos->tipopersona;
            if ($datos->hasFile('archivo_cliente')) {
                $persona->avatar     = $datos->file('archivo_cliente')->store('public');
            }else{
                $persona->avatar     ="public/default.png";
            }
            $persona->save();
            return "Guardado";

        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al guardar la información de la persona. | Detalles: ', $e);
        }
    }


    public function Actualizar_Producto($datos, $id){   // actualizo los datos
        try {
            $persona=Persona::findOrFail($id);
            $persona->nombre         = $datos->get('Firstname');
            $persona->apellido       = $datos->get('Lastname');
            $persona->tipo_documento = $datos->get('tipoDoc');
            $persona->documento      = $datos->get('document');
            $persona->genero         = $datos->get('genero');
            $persona->fecha_nacimiento = $datos->get('age');
            $persona->telefono       = $datos->get('phone');
            $persona->ciudad         = $datos->get('city');
            $persona->direccion      = $datos->get('adress');
            $persona->email          = $datos->get('email');
            $persona->tipo_persona   = $datos->get('tipopersona');
            if ($datos->hasFile('archivo_cliente')) {
                $persona->avatar     = $datos->file('archivo_cliente')->store('public');
            }else{
                $persona->avatar     = $persona->avatar;
            }
            $persona->update();
            DB::commit();
            return "Actualizado";

        } catch (\Exception $e) {
            DB::rollBack();  //si la transaccion anterior es nula
            throw $e;
            return "error";
        }
    }










}
