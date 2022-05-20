<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class Persona extends Model
{
    use HasFactory;
    protected $table ="persona";


    function ID_Persona(){
        try {
            $IDPER = DB::table('persona')->select('id')->max('id');
            return $IDPER + 1;
        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al consultar el nuevo ID. | Detalles: ', $e);
        }
    }


    function Valida_Persona($doc){
        try {
            $ExistePersona = DB::table('persona')->select('documento')->where('documento', $doc)->paginate(1);
            foreach ($ExistePersona as $per ) {
                if ($per->documento == $doc) {
                    return 'Cliente ya existe';
                }else{
                    return 'No existe';
                }
            }
        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al consultar el documento. | Detalles: ', $e);
        }
    }


    public function Guardar_Persona($datos, $idPersona, $iduser){  //$nombre, $apellido, $tipo_documento, $documento, $genero, $fecha_nacimiento, $telefono, $ciudad, $direccion, $email, $tipo_persona, $imagen
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


    public function Actualizar_Persona($datos, $id){
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


    public function Buscar_Personas($Nombre, $TipoPersona){

        if (strlen($Nombre) > 0) {
            $listClientes=DB::table('persona')
            ->join('cliente','cliente.id_persona','=','persona.id')
            ->select('cliente.id as id_cliente','persona.id', 'persona.nombre', 'persona.apellido', 'cliente.tipo_cliente', 'persona.documento', 'persona.genero', 'persona.fecha_nacimiento', 'persona.telefono', 'persona.ciudad', 'persona.direccion', 'persona.email')
            ->where('persona.nombre', 'like', '%'.$Nombre.'%')
            ->Where('persona.tipo_persona', $TipoPersona)
            ->where('cliente.estado_cliente', 'Activo')
            ->orderBy('id', 'asc')->paginate(10);
            return $listClientes;
        }
    }


    public function Buscar_Persona_ID($IdPersona, $TipoPersona){

        if (strlen($IdPersona) > 0) {
            if ($TipoPersona == "Cliente") {

                $listClientes=DB::table('persona')
                ->join('cliente','cliente.id_persona','=','persona.id')
                ->select('cliente.id as id_cliente','persona.id', 'persona.nombre', 'persona.apellido', 'cliente.tipo_cliente', 'persona.documento', 'persona.tipo_documento', 'persona.genero', 'persona.fecha_nacimiento', 'persona.telefono', 'persona.ciudad', 'persona.direccion', 'persona.email', 'persona.avatar', 'persona.created_at as creado', 'cliente.estado_cliente')
                ->where('persona.id', $IdPersona)
                ->Where('persona.tipo_persona', $TipoPersona)
                ->where('cliente.estado_cliente', 'Activo')->paginate(1);
                // dd($listClientes);
                return $listClientes;

            }else if ($TipoPersona == "Usuario") {

                $listusuario=DB::table('users')
                ->join('persona','persona.id_usuario','=','users.id')
                ->select('users.id as id_user','persona.id as id_persona', 'persona.nombre', 'persona.apellido', 'users.name as nombreuser', 'persona.documento', 'persona.tipo_documento', 'persona.genero', 'persona.fecha_nacimiento', 'persona.telefono', 'persona.ciudad', 'persona.direccion', 'persona.email', 'persona.avatar', 'persona.created_at as creado', 'users.estado')
                ->where('persona.id', $IdPersona)
                ->Where('persona.tipo_persona', $TipoPersona)
                ->where('users.estado', 'Activo')->paginate(1);
                // dd($listusuario);
                return $listusuario;

            }
        }
    }


    public function Lista_Personas_General($TipoPersona){

        if ($TipoPersona == "Cliente") {
            $listClientes=DB::table('persona')
            ->join('cliente','cliente.id_persona','=','persona.id')
            ->select('cliente.id as id_cliente','persona.id', 'persona.nombre', 'persona.apellido', 'persona.documento', 'cliente.tipo_cliente', 'persona.genero', 'persona.fecha_nacimiento', 'persona.telefono', 'persona.ciudad', 'persona.direccion', 'persona.email')
            ->where('tipo_persona', $TipoPersona)
            ->where('cliente.estado_cliente', 'Activo')
            ->orderBy('persona.nombre', 'asc')->paginate(10);
            return $listClientes;

        }else if ($TipoPersona == "Usuario") {
            $listUsuarios=DB::table('persona')
            ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
            ->where('tipo_persona', $TipoPersona)
            ->orderBy('id', 'asc')->paginate(10);
            return $listUsuarios;
        }
    }

}
