<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConfigController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function empresa_index ( )
    {
        $datosempresa=DB::table('empresa')
        ->select('id', 'nombre', 'tipo_empresa', 'descripcion', 'ciudad', 'direccion', 'telefono', 'email', 'facebook', 'instagram', 'whatsapp', 'imagen')
        ->orderBy('id', 'asc')->paginate(1);
        //dd($datosempresa);
        return view('configuracion_general', compact('datosempresa'));

    }


}
