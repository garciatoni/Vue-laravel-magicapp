<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;


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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Rutas publicas
Route::post('/login', [AuthController::class, 'login']); //RUTA PARA REALIZAR EL LOGIN
Route::post('/register', [AuthController::class, 'register']); //RUTA PARA REALIZAR UN REGISTRO
Route::get('/books', [BookController::class, 'index']);//RUTA PARA MOSTRAR TODOS LOS LIBROS DE LA BASE DE DATOS
Route::post('/libro/{id}', [BookController::class, 'show']);//RUTA PARA MOSTRAR UN LIBRO CON UNA ID ESPECIFICA

//Rutas privadas
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');//RUTA PARA HACER LOGOUT, REQUIERE ESTAR AUTENTICADO.
Route::post('/editUser/{id}', [AuthController::class, 'edit']);//RUTA PARA EDITAR DATOS DE LA CUENTA.
