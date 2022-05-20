<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use League\CommonMark\Extension\Table\Table;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function usuarios_index(Request $request)
    {
        if(isset($request)){
            $FindhText=trim($request->get('Buscar_usuario'));

                if (strlen($FindhText)<=0) {
                $listUsuario=DB::table('persona')
                    ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
                    ->where('tipo_persona', 'Usuario')
                    ->orderBy('id', 'asc')->paginate(10);
                    return view('usuarios_general', compact('listUsuario', 'FindhText'));
                }else{

                    $listUsuario=DB::table('persona')
                    ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
                    ->where('nombre', 'like', '%'.$FindhText.'%')
                    //->orWhere('apellido', 'like', '%'.$FindhText.'%')
                    ->Where('tipo_persona', 'Usuario')
                    ->orderBy('id', 'asc')->paginate(10);
                    return view('usuarios_general', compact('listUsuario', 'FindhText'));
                }
            }
    }





    public function usuarios_create() //form de crear nuevo usuario
    {
        return view('usuarios_create');
    }
    public function usuarios_save(Request $request) //form guardar datos
    {
        $persona = new Persona();
        $user = new User();

        if($persona->Valida_Persona($request->document) == 'Usuario ya existe'){
            return back()->with('fail',' El usuario ya existe, intente nuevamente.');
        }else{

            $nombre = $request->name." ".$request->lastname;
            if ($user->usuario_save($nombre, $request->email, $request->password) == "Usuario Guardado") {

                $idPersona = $persona->ID_Persona();
                $idu = DB::table('users')->select('id')->max('id');
                if ($persona->Guardar_Persona($request, $idPersona, $idu) == "Guardado") {
                    return redirect()->route('usuarios.general')->with('fine', 'Usuario guardado exitosamente.');
                }else{
                    return back()->with('fail',' Error al guardar la información del usuario.');
                }

            }else {
                return back()->with("fail", "Fallo  general al guardar la información del usuario.");
            }

        }
    }



    public function usuarios_update($idusuario) //formulario de actualizar datos
    {
        try {

            $persona = new Persona();
            $datosusuario = $persona->Buscar_Persona_ID($idusuario, "Usuario");
            return view('usuarios_update', compact('datosusuario'));

        } catch (\Throwable $e) {

            throw $e;
            echo "error";

        }

    }
    public function usuarios_edit(Request $request, $idp) //ruta de actualizar datos
    {
        try {

            $persona = new Persona();
            $usuario = new User();
            // dd($request);
            if($persona->Actualizar_Persona($request, $idp) == "Actualizado"){

                if ($usuario->Actualizar_Usuario($request->id_user, $request->nombreuser, $request->email) == "Actualizado") {
                    return redirect()->route('usuarios.general')->with('fine','Usuario actualizado correctamente.');
                }else{
                    return back()->with('fail','Ha ocurrido un error al actualizar los datos del usuario.');
                }
            }else{
                return back()->with('fail','Ha ocurrido un error al guardar la información del usuario.');
            }


        } catch (\Exception $e) {

            DB::rollBack();  //si la transaccion anterior es nula
            throw $e;
            echo "error";
        }
    }


    public function usuarios_show(persona $usuario) //Vista y form de visualizar datos
    {
        return view('usuarios_option', compact('usuario'));
    }

    public function usuarios_destroy($id) //Ruta Funcion de eliminar datos
    {
        try {
            DB::beginTransaction();
            $Eliminarusuario=Persona::findOrFail($id);
            $Eliminarusuario->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();  //si la transaccion anterior es nula
        }
        return redirect()->route('usuarios.general');
    }





}
