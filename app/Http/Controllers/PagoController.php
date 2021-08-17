<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Pago;
use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::all();

        return response()->json([
            "data"=> $pagos,
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
          //se almacena un Pago
          $pago = Pago::create($request->all());
          return response()->json([
  
              "message" => "El pago fue creado exitosamente!!",
              "data" => $pago,
              "status" => Response::HTTP_CREATED
          ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function show(Pago $pago)
    {
        $alumno = Alumno::findOrfail($pago->id);
        $costo = Precio::findOrfail($pago->id);
        return response()->json([
            
            "alumno" => $alumno,
            "costo" =>$costo,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pago $pago)
    {
        $pago->update($request->all());
        return response()->json([
            "message" => "Se ha actualizado el(los) dato(s) del pago correctamente!!",
            "data" => $pago,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pago  $pago
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pago $pago)
    {
        $pago->delete();
        return response([
            "message" => "Se ha eliminado correctamente el pago",
            "data" => $pago,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK) ;
    }
}
