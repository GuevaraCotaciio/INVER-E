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


    public function usuario_save($name, $email, $pass){

        $user = new User();
        $iduser = DB::table('users')->select('id')->max('id');
        $idu = $iduser + 1;
        $user->id = $idu;
        $user->name = $name;
        $user->email = $email;
        $user->password = $pass->hash;
        $user->save();

        return "Usuario Guardado";
    }

    public function Actualizar_Usuario($id, $nomuser, $correo){
        try {
            // dd( "datos:".$id." , nombre ".$nomuser." , correo ".$correo);
            $cliente=User::findOrFail($id);
            $cliente->name = $nomuser;
            $cliente->email = $correo;
            $cliente->update();
            DB::commit();
            return "Actualizado";

            } catch (\Exception $e) {
                DB::rollBack();  //si la transaccion anterior es nula
            }
    }

}
