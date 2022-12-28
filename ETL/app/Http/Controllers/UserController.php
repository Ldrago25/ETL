<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Imports\DatosImport;
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
           $datos = new DatosImport;
           Excel::import($datos, $path);

           if(!empty($datos)){
            //$datos = $datos->toArray();
            return response()->json([
                'mensaje'=>$datos
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
