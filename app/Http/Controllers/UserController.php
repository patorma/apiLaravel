<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

    public function login(){
        //datos del usuario
        $data = [
            'email' => request('email'),
            'password' =>request('password')
        ];
        //el metodo de auth va intentar un login para el usuario
        // el attempt va a tener un arreglo con la informacion necesaria para loguearse
        // esto devuelve true o false esta condicion de verificar el inicio de sesion
        if(Auth::attempt($data)){
            return response()->json('Bienvenido',200);
        }else{
            return response()->json('Error en el login',401);
        }
    }
}

