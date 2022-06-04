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
        if ($empresa->Guardar_empresa($Request) == "Guardado") {
            return redirect()->route('configuracion.general', $Request->id_user)->with('fineE','Empresa creada correctamente.');

        }elseif ($empresa->Guardar_empresa($Request) == "Fallo") {
            return redirect()->route('configuracion.general', $Request->id_user)->with('failE',' Error al crear la empresa.');

        }
    }


    public function empresa_update()
    {
        $datosempresa = DB::table('empresa')
        ->select('*')->get();
        // dd($datosempresa);

        return view('empresa_update', compact('datosempresa'));
    }


    public function empresa_edit(Request $Request, $IdEmpresa)
    {
        $empresa = new Empresa();
        if ($empresa->Actualizar_empresa($Request, $IdEmpresa) == "Actualizado") {
            return redirect()->route('configuracion.general', $Request->id_user)->with('fineE','Información de la empresa actualizada correctamente.');

        }elseif ($empresa->Actualizar_empresa($Request, $IdEmpresa) == "Fallo") {
            return redirect()->route('configuracion.general', $Request->id_user)->with('failE',' Error al actualizar la información de la empresa.');

        }
    }


}
