<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    function Usuario_creado(){
        try {
            $IDUSER = DB::table('users')->select('id')->max('id');
            $datosuser=DB::table('users')->select('id', 'name', 'email')->where('id', $IDUSER)->paginate(1);
            return $datosuser;
        } catch (\Exception $e) {
            throw $e;
            return back()->with('fail','Ha ocurrido un error al consultar el nuevo ID. | Detalles: ', $e);
        }
    }

    public function usuario_save($datos){

        User::create($datos->only('name', 'email')+ ['password' => bcrypt($datos->input('password')) ]);
        // return redirect()->route('usuarios.create')->with('saved', 'Completa por favor lo siguientes datos.');
        return "Guardado";
    }

    public function Actualizar_Usuario($id, $nomuser, $estado, $correo, $rol){
        try {
            // dd( "datos:".$id." , nombre ".$nomuser." , correo ".$correo);
            $usuario=User::findOrFail($id);
            $usuario->name = $nomuser;
            $usuario->estado = $estado;
            $usuario->email = $correo;
            $usuario->cargo = $rol;
            $usuario->update();
            DB::commit();
            return "Actualizado";

            } catch (\Exception $e) {
                DB::rollBack();  //si la transaccion anterior es nula
            }
    }


    public function Buscar_User_ID($Iduser){

        if (strlen($Iduser) > 0) {

                $user=DB::table('users')
                ->join('persona','persona.id_usuario','=','users.id')
                ->select('users.id as id_user','persona.id as id_persona', 'persona.nombre', 'persona.apellido', 'users.name as nombreuser', 'persona.documento', 'persona.tipo_documento', 'persona.genero', 'persona.fecha_nacimiento', 'persona.telefono', 'persona.ciudad', 'persona.direccion', 'persona.email', 'persona.avatar', 'persona.created_at as creado', 'users.estado')
                ->where('users.id', $Iduser)->paginate(1);
                // dd($listusuario);
                return $user;


        }
    }

}
