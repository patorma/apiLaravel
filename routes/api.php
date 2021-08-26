<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\PrecioController;
use App\Http\Controllers\EmpresaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'auth:api'],function(){
    Route::apiResource('/precios',PrecioController::class);
    Route::apiResource('/empresas',EmpresaController::class);
    Route::apiResource('/alumnos',AlumnoController::class);
    Route::apiResource('/pagos',PagoController::class);
});