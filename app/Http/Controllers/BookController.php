<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['comentarios'] = DB::table('comentarios')->where('id_libro', '=', $id)->get();
        $data["book"] = DB::table('books')->where('isbn', '=', $id)->get();
        // $data["id"] = $id;
        return   $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
    }

    public function añadirComentario($id, Request $request)
    {
        $user = User::find($id);
        $comentario = new Comentario;
        $comentario->id_user = $id;
        $comentario->name = $user->name;
        $comentario->id_libro = $request->id_libro;
        $comentario->texto_reseña = $request->texto_reseña;
        $comentario->save();
        // return $user->name;
    }
    public function getComentario($id)
    {
        $books = DB::table('comentarios')->where('id_libro', '=', $id)->get();
        return $books;
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}