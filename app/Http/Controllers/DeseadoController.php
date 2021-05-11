<?php

namespace App\Http\Controllers;

use App\Models\Deseado;

use App\Models\Book;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use LengthException;

class DeseadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $books = DB::table('deseados')->where('id_user', '=', $id)->get();
        $data['wish'] = $books;
        // $lista = DB::table('books')->where('isbn', '=', $books->id_libro)->get();
        $lista_libros = [];
        foreach ($books as $b) {

            $libro = DB::table('books')->where('isbn', '=', $b->id_libro)->get();
            array_push($lista_libros, $libro);
        }
        $data['libros'] = $lista_libros;
        return  $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $books = DB::table('deseados')->where('id_user', '=', $id)->where('id_libro', '=', $request->id_libro)->get();

        if (sizeof($books) == 0) {
            $libro = new Deseado;
            $libro->id_user = $id;
            $libro->id_libro = $request->id_libro;
            $libro->save();
            return $libro;
        } else {
            return 'ya esta';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        $book = DB::table('deseados')->where('id_user', '=', $id)->where('id_libro', '=', $request->id)->delete();
        return response()->noContent();
    }
}
