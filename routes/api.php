<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



//CONTROLADORES QUE SE LLAMAN EN LAS RUTAS

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ColecionController;
use App\Http\Controllers\CartaController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\ArtistaCartaController;
use App\Http\Controllers\ColecionCartaController;
use App\Http\Controllers\DeckController;
use App\Http\Controllers\wants;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); //Ruta de autentificación de laravel sanctum (para usar vue.js como SPA)


//Rutas publicas
Route::post('/login', [AuthController::class, 'login']); //RUTA PARA REALIZAR EL LOGIN
Route::post('/register', [AuthController::class, 'register']); //RUTA PARA REALIZAR UN REGISTRO DE USUARI

Route::post('/SetColecion', [ColecionController::class, 'store']);
Route::post('/SetCarta', [CartaController::class, 'store']);
Route::post('/SetArtista', [ArtistaController::class, 'store']);
Route::post('/SetArtistaCarta', [ArtistaCartaController::class, 'store']);
Route::post('/SetColecionCarta', [ColecionCartaController::class, 'store']);

Route::get('/GetColecion/{id}', [ColecionController::class, 'show']);
Route::get('/GetColeciones', [ColecionController::class, 'index']);
Route::get('/GetColecionCartas/{id}', [ColecionCartaController::class, 'show']);
Route::get('/GetCarta/{id}', [CartaController::class, 'show']);
Route::get('/GetArtistas', [ArtistaController::class, 'index']);
Route::get('/GetArtistaCartas/{id}', [ArtistaCartaController::class, 'show']);

Route::post('/GetCartas', [CartaController::class, 'index']);

Route::get('/GetColecion2/{id}', [ColecionController::class, 'show2']);




Route::post('/libro/{id}', [BookController::class, 'show']); //RUTA PARA MOSTRAR UN LIBRO CON UNA ID ESPECIFICA
Route::post('/getComentario/{id}', [BookController::class, 'getComentario']); //RUTA QUE DEVUELVE  TODOS LOS COMENTARIOS DE UN LIBRO
Route::post('/forgotPassword', [AuthController::class, 'forgot']); //RUTA QUE ENVIA UN CORREO PARA RESTABLECER LA CONTRASEÑA.
Route::get('/moreRating', [BookController::class, 'moreRating']); //RUTA PARA MOSTRAR LOS 20 LIBROS MAS VALORADOS POR LA COMUNIDAD.
Route::post('/search', [BookController::class, 'store']); //RUTA PARA DEVOLVER UNA BUSQUEDA DE LIBROS


Route::post('/SetDeck/{id}', [DeckController::class, 'create']);
Route::get('/GetDecks/{id}', [DeckController::class, 'index']);

Route::post('/SetWant/{id}', [wants::class, 'create']);
Route::get('/GetWant/{id}', [wants::class, 'index']);
//Rutas privadas
Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);//RUTA PARA HACER LOGOUT, REQUIERE ESTAR AUTENTICADO.
    Route::post('/editUser/{id}', [AuthController::class, 'edit']);//RUTA PARA EDITAR DATOS DE LA CUENTA.

    Route::post('/DeleteUser/{id}', [AuthController::class, 'delete']);//RUTA PARA ELIMINAR UN USUARIO



});


