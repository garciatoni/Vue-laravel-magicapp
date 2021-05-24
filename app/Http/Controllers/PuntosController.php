<?php

namespace App\Http\Controllers;

use App\Models\Deseado;

use App\Models\Book;
use App\Models\Punto;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use LengthException;


//CONTROLADOR DE LOS PUNTOS DE LOS LIBROS

class PuntosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        /*Recibe el id del usuario, el id del libro y la puntiación del mismo, compruba si este usuario ya ha realizado una puntuación
        para ese libro, si no es el caso procede a guardarla en la base de datos, acontinuación hace la media de todas las
        puntucaciónes de ese libro,
        realiza la media y guarda esa media en la puntuación del propio libro.*/

        $puntoexist = DB::table('puntos')->where('id_user', '=', $id)->where('id_libro', '=', $request->id_libro)->get();

        if (sizeof($puntoexist) == 0) {
            $rating = new Punto;
            $rating->id_user = $id;
            $rating->id_libro = $request->id_libro;
            $rating->puntos = $request->puntos;
            $rating->save();
        } else {
            $data['existe'] = $puntoexist[0]->puntos;
        }

        $puntos = DB::table('puntos')->where('id_libro', '=', $request->id_libro)->get();
        $suma = 0;
        $total = 0;
        foreach ($puntos as $punto) {
            $suma = $suma + $punto->puntos;
            $total++;
        }
        $media = $suma / $total;

        $data['media'] = round($media, 2);
        $book = DB::table('books')->where('isbn', '=', $request->id_libro)->update(['rating' => round($media, 2)]);
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request)
    {
        $puntoexist = DB::table('puntos')->where('id_user', '=', $id)->where('id_libro', '=', $request->id_libro)->get();
        if (sizeof($puntoexist) != 0) {
            $data['puntosUser'] = $puntoexist[0]->puntos;
            $book = DB::table('books')->where('isbn', '=', $request->id_libro)->get();
            $data['rating' ] = $book[0]->rating;
            return $data;
        }else{
            return 0;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
    }
}
