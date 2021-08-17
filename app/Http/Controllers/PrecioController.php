<?php

namespace App\Http\Controllers;

use App\Models\Precio;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrecioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precios = Precio::all();

        return response()->json([
            "data"=> $precios,
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
        
        
        //se almacena un precio
        $precio = Precio::create($request->all());
        return response()->json([

            "message" => "El precio fue creado exitosamente!!",
            "data" => $precio,
            "status" => Response::HTTP_CREATED
        ],Response::HTTP_CREATED);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function show(Precio $precio)
    {
        
        return response()->json([
            "data" => $precio,
            "status" => Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precio $precio)
    {
       $precio->update($request->all());
        return response()->json([
            "message" => "Se ha actualizado el(los) dato(s) del precio correctamente!!",
            "data" => $precio,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Precio  $precio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precio $precio)
    {
         $precio->delete();
        return response([
            "message" => "Se ha eliminado correctamente el precio",
            "data" => $precio,
            "status" =>  Response::HTTP_OK
        ], Response::HTTP_OK) ;
    }
}
