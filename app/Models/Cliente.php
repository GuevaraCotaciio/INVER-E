<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\Persona;
use Facade\FlareClient\Http\Client;

class Cliente extends Model
{
    use HasFactory;
    protected $table ="cliente";



    function ID_cliente(){
        $IDCLI = DB::table('cliente')->select('id')->max('id');
        return  $IDCLI + 1;
    }

    public function Guardar_Cliente($idp){

        $cliente = new Cliente();
        $idc =  $cliente->ID_cliente();
        $cliente->id             = $idc;
        $cliente->id_persona     = $idp;
        $cliente->estado_cliente = "Activo";
        $cliente->tipo_cliente   = "Productor";

        $cliente->save();
        return "Guardado";
    }


    public function Buscar_Cliente($texto){

        //  $clientes = Persona::where('nombre', 'LIKE', '%'.$texto.'%')->take(4)->get();

            $clientes=Persona::join('cliente','cliente.id_persona','=','persona.id')
            ->select('cliente.id as id_cliente','persona.id', 'persona.nombre', 'persona.apellido', 'persona.documento', 'cliente.tipo_cliente', 'persona.genero', 'persona.fecha_nacimiento', 'persona.telefono', 'persona.ciudad', 'persona.direccion', 'persona.email')
            ->where('tipo_persona', 'Cliente')
            ->where('cliente.estado_cliente', 'Activo')
            ->where('persona.nombre', 'LIKE', '%'.$texto.'%')
            ->orderBy('persona.nombre', 'asc')->get();

        return $clientes;
    }



    public function Buscar_Cliente_pedidos($idcliente){

        if (strlen($idcliente) > 0) {

            $listClientes=DB::table('persona')
            ->join('cliente','cliente.id_persona','=','persona.id')
            ->select('cliente.id as id_cliente','persona.id', 'persona.nombre', 'persona.apellido', 'cliente.tipo_cliente', 'persona.documento', 'persona.genero', 'persona.fecha_nacimiento', 'persona.telefono', 'persona.ciudad', 'persona.direccion', 'persona.email')
            ->where('cliente.id',$idcliente)
            ->orderBy('id', 'asc')->paginate(1);
            return $listClientes;
        }
    }




    public function Actualizar_Cliente($id, $tipo){
        try {

            $cliente=Cliente::findOrFail($id);
            $cliente->tipo_cliente = $tipo;
            $cliente->update();
            DB::commit();
            return "Actualizado";

            } catch (\Exception $e) {
                DB::rollBack();  //si la transaccion anterior es nula
            }
    }

    public function Eliminar_Cliente($id){

        try {
        $cliente=Cliente::findOrFail($id);
        $cliente->estado_cliente = "Inactivo";
        $cliente->update();
        DB::commit();
        return "Inactivado";

        } catch (\Exception $e) {
            DB::rollBack();  //si la transaccion anterior es nula
        }

        // return redirect()->route('clientes_general');
        // try {
        //     DB::beginTransaction();
        //     $Eliminarcliente=Persona::findOrFail($id);
        //     $Eliminarcliente->delete();
        //     DB::commit();
        // } catch (\Exception $e) {
        //     DB::rollBack();  //si la transaccion anterior es nula
        // }
        // return redirect()->route('clientes_general');
    }



}
