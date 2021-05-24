<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\User;
use Illuminate\Support\Facades\Password;

//CONTROLADORES QUE SE LLAMAN EN LAS RUTAS
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeseadoController;
use App\Http\Controllers\PuntosController;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
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
}); //Ruta de autentificación de laravel sanctum (para usar vue.js como SPA)


//Rutas publicas
Route::post('/login', [AuthController::class, 'login']); //RUTA PARA REALIZAR EL LOGIN
Route::post('/register', [AuthController::class, 'register']); //RUTA PARA REALIZAR UN REGISTRO DE USUARIO
Route::get('/books', [BookController::class, 'index']); //RUTA PARA MOSTRAR TODOS LOS LIBROS DE LA BASE DE DATOS PAGINADOS
Route::post('/libro/{id}', [BookController::class, 'show']); //RUTA PARA MOSTRAR UN LIBRO CON UNA ID ESPECIFICA
Route::post('/getComentario/{id}', [BookController::class, 'getComentario']); //RUTA QUE DEVUELVE  TODOS LOS COMENTARIOS DE UN LIBRO
Route::post('/forgotPassword', [AuthController::class, 'forgot']); //RUTA QUE ENVIA UN CORREO PARA RESTABLECER LA CONTRASEÑA.
Route::get('/moreRating', [BookController::class, 'moreRating']); //RUTA PARA MOSTRAR LOS 20 LIBROS MAS VALORADOS POR LA COMUNIDAD.
Route::post('/search', [BookController::class, 'store']); //RUTA PARA DEVOLVER UNA BUSQUEDA DE LIBROS


//Rutas privadas
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum'); //RUTA PARA HACER LOGOUT, REQUIERE ESTAR AUTENTICADO.
Route::post('/editUser/{id}', [AuthController::class, 'edit'])->middleware('auth:sanctum'); //RUTA PARA EDITAR DATOS DE LA CUENTA.
Route::post('/setComentario/{id}', [BookController::class, 'añadirComentario'])->middleware('auth:sanctum'); //RUTA PARA GUARDAR UN COMENTARIO DE UN LIBRO
Route::post('/SetWish/{id}', [DeseadoController::class, 'store'])->middleware('auth:sanctum'); //RUTA PARA GUARDAR UN LIBRO EN LA LISTA DE DESEADOS
Route::post('/GetWish/{id}', [DeseadoController::class, 'index'])->middleware('auth:sanctum'); //RUTA QUE DEVUELVE LOS LIBROS DESEADOS
Route::post('/DeleteWish/{id}', [DeseadoController::class, 'destroy'])->middleware('auth:sanctum'); //RUTA PARA BORRAR UN LIBRO DESEADO
Route::post('/SetPuntos/{id}', [PuntosController::class, 'create'])->middleware('auth:sanctum'); //Ruta para guardar la puntuación que da un usuario a un libro
Route::post('/GetPuntos/{id}', [PuntosController::class, 'show'])->middleware('auth:sanctum'); //RUTA PARA VERIFICAR SI UN USUARIO YA HA PUNTUADO UN LIBRO.
Route::post('/DeleteUser/{id}', [AuthController::class, 'delete'])->middleware('auth:sanctum');//RUTA PARA ELIMINAR UN USUARIO


RateLimiter::for('rainforest', function (Request $request) {
    return Limit::perMinute(100000);
}); //LIMITADOR DE LLAMADAS A UN GRUPO CONCRETO DE APIS (rainforest)

Route::middleware(['throttle:rainforest'])->group(function () {

    Route::post('/newBook', [BookController::class, 'create']); //RUTA PARA INTRODUCIR UN LIBRO A LA BASE DE DATOS

});//GRUPO (rainforest) DE APIS CON CON EL LIMITADOR ESTABLECIDO