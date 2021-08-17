<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return response()->json([
            "data"=> $alumnos,
            "status" => Response::HTTP_OK
        ],Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //se almacena un Alumno
        $alumno = Alumno::create($request->all());
        return response()->json([

            "message" => "El alumno fue creado exitosamente!!",
            "data" => $alumno,
            "status" => Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function show(Alumno $alumno)
    {
        //  findOrfail: Toma una identificación y devuelve un solo modelo.
        $empresa = Empresa::findOrfail($alumno->id);
        return response()->json([
            "alumno" => $alumno,
            "empresa" => $empresa,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumno $alumno)
    {
        $alumno->update($request->all());
        return response()->json([
            "message" => "Se ha actualizado el(los) dato(s) del alumno correctamente!!",
            "data" => $alumno,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumno  $alumno
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return response([
            "message" => "Se ha eliminado correctamente el alumno",
            "data" => $alumno,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK) ;
    }
}
