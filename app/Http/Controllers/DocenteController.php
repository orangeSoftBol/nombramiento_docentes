<?php

namespace App\Http\Controllers;

use App\Docente;
use Illuminate\Http\Request;

use App\Http\Requests;

class DocenteController extends Controller
{
    // devolver docentes de bd

    public  function  store(Request $request){
        $docente = new Docente();
        $docente->CODIGO2 = "doc0001";
        $docente->CI = $request->ci;
        $docente->NOMBRE = $request->nombre;
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

        $docente->save();
        return redirect('nombramiento');
        /*
                return response()->json([
                    "msg" => "Success",
                    "id" => $nombramiento->id
                ],200
                );
        */
    }

    public function index(){
        return Docente::all();
    }

}
