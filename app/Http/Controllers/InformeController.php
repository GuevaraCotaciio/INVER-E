<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class InformeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function informes_index()
    {
        return view('informes_general');
    }


    public function informes_clientes() //vista
    {
        //información general de clientes
        $InfoClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->paginate(10);
        //return view('informes_clientes', compact('InfoClientes'));

        //información pedidos por cliente
        $PedidosClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->paginate(10);
        //return view('informes_clientes', compact('PedidosClientes'));

        //información tipo producto por clientes
        $ProductoClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->paginate(10);

        return view('informes_clientes', compact('InfoClientes','PedidosClientes','ProductoClientes'));
    }

    public function informePDF_clientes() //vista
    {
        $listClientes=DB::table('persona')
        ->select('id', 'nombre', 'apellido', 'documento', 'genero', 'fecha_nacimiento', 'telefono', 'ciudad', 'direccion', 'email')
        ->where('tipo_persona', 'Cliente')
        ->orderBy('id', 'asc')->paginate(10);
        //dd($listClientes);

        //Genero el PDF
        $pdr =PDF::setOptions([ 'dpi' => 150 , 'defaultFont' => 'verdana' ])->setPaper('a4', 'landscape')->setWarnings(false); //perzonalizo
        $pdf = PDF::loadview('InformesPDF/informe_cliente_general',compact('listClientes')); //creo el PDF
        return $pdf->stream();  //Retorno el PDF
    }



    public function PDF_clientes() //vista
    {

    }





}
