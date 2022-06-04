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
            $user = new User();
            if ($user->usuario_save($request) == "Guardado"){

                return  redirect()->route('usuarios.datos');  //  view('usuarios_create_datos', compact('datosuser', 'roles'));

            }else{
                return back()->with("fail", "Error al guardar la información del usuario.");
            }
    }

    public function usuarios_datos(Request $request) // retorna datos de usuario guardado
    {
        $user = new User();
        $datosuser = $user->Usuario_creado();
        $roles = DB::table('roles')->select('id','nombre')->get();
        return  view('usuarios_create_datos', compact('datosuser', 'roles'));

    }


    public function usuarios_informacion(Request $request) //form guardar datos
    {
        $user = new User();
        $persona = new Persona();
        if($persona->Valida_Persona($request->document) == 'Usuario ya existe'){
            return back()->with('fail','El número de documento ya existe, por favor intente nuevamente.');
        }else{

            $idpersona = $persona->id_persona();
            // $idu = db::table('users')->select('id')->max('id');
            if ($persona->guardar_persona($request, $idpersona, $request->id_user) == "Guardado") {
                $user->Actualizar_Usuario($request->id_user, $request->username, $request->estado, $request->email, $request->cargo);
                return redirect()->route('usuarios.general')->with('fine', 'Usuario guardado exitosamente.');
            }else{
                return back()->with('fail',' error al guardar la información del usuario.');
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

            if ($request->rol == "UserPersonal") {

                 // dd($request);f
                 if($persona->Actualizar_DatosPersonal($request, $idp) == "Actualizado"){
                    return redirect()->route('configuracion.general', $request->ID_usuario)->with('fine','Información actualizada correctamente.');

                }else{
                    return back()->with('fail','Ha ocurrido un error al guardar la información personal.');
                }



            }elseif ($request->rol == "UsuariosGeneral") {

                // dd($request);
                if($persona->Actualizar_Persona($request, $idp) == "Actualizado"){

                    if ($usuario->Actualizar_Usuario($request->id_user, $request->nombreuser, $request->estado, $request->email, $request->cargo) == "Actualizado") {
                        return redirect()->route('usuarios.general')->with('fine','Usuario actualizado correctamente.');
                    }else{
                        return back()->with('fail','Ha ocurrido un error al actualizar los datos del usuario.');
                    }
                }else{
                    return back()->with('fail','Ha ocurrido un error al guardar la información del usuario.');
                }

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
