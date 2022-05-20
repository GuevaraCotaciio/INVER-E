<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\FuncCall;

class EmpresaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function empresa_index()
    {

        $empresa=DB::table('empresa')
        ->select('id', 'nombre', 'tipo_empresa', 'descripcion', 'ciudad', 'direccion', 'telefono', 'email', 'facebook', 'instagram', 'whatsapp', 'imagen')
        ->orderBy('id', 'asc')->paginate(10);
        return view('clientes_general', compact('listClientes', 'FindhText'));

    }

    public function empresa_save(Request $Request)
    {
        $empresa = new Empresa();
        $empresa->nombre = $Request->Nombre_E;
        $empresa->tipo_empresa = $Request->tipoE;
        $empresa->descripcion = $Request->description;
        $empresa->ciudad = $Request->Ciudad;
        $empresa->direccion = $Request->address;
        $empresa->telefono = $Request->phone;
        $empresa->email = $Request->email;
        $empresa->facebook = $Request->facebook;
        $empresa->instagram = $Request->instagram;
        $empresa->whatsapp = $Request->whatsapp;

        if ($Request->hasFile('archivo')) {
            $empresa->imagen = $Request->file('archivo')->store('public');
        }

        $empresa->save();

        return "hecho";
    }


}
