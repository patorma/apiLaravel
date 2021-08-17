<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();

        return response()->json([
            "data"=> $empresas,
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
         //se almacena una empresa
         $empresa = Empresa::create($request->all());
         return response()->json([
 
             "message" => "La empresa fue creada exitosamente!!",
             "data" => $empresa,
             "status" => Response::HTTP_CREATED
         ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return response()->json([
            "data" => $empresa,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $empresa->update($request->all());
        return response()->json([
            "message" => "Se ha actualizado el(los) dato(s) de la empresa correctamente!!",
            "data" => $empresa,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return response([
            "message" => "Se ha eliminado correctamente la empresa",
            "data" => $empresa,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK) ;
    }
}
