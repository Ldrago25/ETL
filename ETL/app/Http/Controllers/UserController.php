<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Imports\DetailInvoiceImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    //
    public function userLoadETL(Request $request){
        if($request->hasFile("Datos_ETL")){
           $path = $request->file('Datos_ETL')->getRealPath();
           /*
           $datos = Excel::import($path,function($reader){
           })->get();
           */
           $datos = new DetailInvoiceImport;
           Excel::import($datos, $path);

           if(!empty($datos)){
            //$datos = $datos->toArray();
            return response()->json([
                'mensaje'=>'Se cargaron los datos'
            ]);
           }
            return response()->json([
                'mensaje'=>'si mando el archivo'
            ]);
        }
       return response()->json([
        'mensaje'=>"hola"
       ]);
    }
}
