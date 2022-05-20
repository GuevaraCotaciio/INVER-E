<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


// function Valida_Persona($doc){
//     try {
//         $ExistePersona = DB::table('persona')->select('documento')->where('documento', $doc)->paginate(1);
//         foreach ($ExistePersona as $per ) {
//             if ($per->documento == $doc) {
//                 return 'Cliente ya existe';
//             }else{
//                 return 'No existe';
//             }
//         }
//     } catch (\Exception $e) {
//         throw $e;
//         return back()->with('fail','Ha ocurrido un error al consultar el documento. details: ', $e);
//     }

// }

// function ID_Persona(){
//     $IDPER = DB::table('persona')->select('id')->max('id');
//     return $IDPER + 1;
// }



?>
