<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeseadoController;

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
Route::get('/books', [BookController::class, 'index']); //RUTA PARA MOSTRAR TODOS LOS LIBROS DE LA BASE DE DATOS
Route::post('/libro/{id}', [BookController::class, 'show']); //RUTA PARA MOSTRAR UN LIBRO CON UNA ID ESPECIFICA
Route::post('/getComentario/{id}', [BookController::class, 'getComentario']);


//Rutas privadas
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); //RUTA PARA HACER LOGOUT, REQUIERE ESTAR AUTENTICADO.
Route::post('/editUser/{id}', [AuthController::class, 'edit'])->middleware('auth:sanctum'); //RUTA PARA EDITAR DATOS DE LA CUENTA.
Route::post('/setComentario/{id}', [BookController::class, 'añadirComentario'])->middleware('auth:sanctum');
Route::post('/SetWish/{id}', [DeseadoController::class, 'store'])->middleware('auth:sanctum');
Route::post('/GetWish/{id}', [DeseadoController::class, 'index'])->middleware('auth:sanctum');
Route::post('/DeleteWish/{id}', [DeseadoController::class, 'destroy'])->middleware('auth:sanctum');

