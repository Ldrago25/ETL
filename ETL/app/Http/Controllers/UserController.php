<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function userLoadETL(Request $request){
        if($request->hasFile("Datos_ETL")){
  

        }
       return response()->json([
        'mensaje'=>"hola"
       ]);
    }
}
