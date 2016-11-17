<?php

namespace App\Http\Controllers;

use App\Nombramiento;
use Illuminate\Http\Request;

use App\Http\Requests;


class NombramientoController extends Controller
{
    //



   public  function  store(Request $request){
        $nombramiento = new Nombramiento();

        //$nombramiento->CODIGO = "nombra0001";
       //echo($request->lista_de_docentes);
       $nombramiento->carrera = $request->lista_carrera;
       $nombramiento->departamento = $request->lista_departamento;
       $nombramiento->facultad = $request->lista_facultad;
       $nombramiento->diploma = $request->diploma;
       $nombramiento->titulo = $request->titulo;
       $nombramiento->tiempo = $request->lista_dedicacion;
       $nombramiento->fecha_nombramiento = $request->fecha_nombramiento;
       $nombramiento->duracion = $request->duracion;
       $nombramiento->fk_docente = $request->lista_docente;

        /*
        $nombramiento->facultad = $request->facultad;
        $nombramiento->carrera = $request->carrera;
        $nombramiento->departamento = $request->departamento;
        $nombramiento->diploma = $request->diploma;
        $nombramiento->titulo = $request->titulo;
        $nombramiento->fecha_nombramiento = $request->fecha_nombramiento;
        $nombramiento->fecha_solicitud = $request->fecha_solicitud;
        $nombramiento->duracion = $request->duracion;
        */

        $nombramiento->save();
        return redirect('index.html');
/*
          return response()->json([
          "msg" => "Success",
            "id" => $nombramiento->id
        ],200
        );
*/
   }

    public function create()
    {
        return \View::make('new');
    }

    public function index(){
        return Nombramiento::all();
    }

    //devolver registro por clave
    public function show($id)
    {
        return Nombramiento::find($id);
    }
}
