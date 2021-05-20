<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Punto;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


//CONTROLADOR DE LOS LIBROS Y SUS COMENTARIOS

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
        return Book::paginate(18);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


        $libro = DB::table('books')->where('asin', '=', $request->asin)->get();

        if (empty($libro)) {

            $book = new Book;


            if (isset($request->title)) {
                $book->title = $request->title;
            }
            if (isset($request->title_search)) {
                $book->title_search = $request->title_search;
            }
            if (isset($request->cover)) {
                $book->cover = $request->cover;
            }
            if (isset($request->asin)) {
                $book->asin = $request->asin;
            }
            if (isset($request->link)) {
                $book->link = $request->link;
            }

            if (isset($request->author)) {
                $book->author = $request->author;
            }
            if (isset($request->sinopsis)) {
                $book->sinopsis = $request->sinopsis;
            }

            $book->save();
            return $book;

        }else if (is_null($libro[0]->author) && is_null($libro[0]->sinopsis)) {

            /*if (isset($request->title)) {
                $libro[0]->title = $request->title;
            }
            if (isset($request->title_search)) {
                $libro[0]->title_search = $request->title_search;
            }
            if (isset($request->cover)) {
                $libro[0]->cover = $request->cover;
            }
            if (isset($request->author)) {
                $libro[0]->author = $request->author;
            }
            if (isset($request->sinopsis)) {
                $libro[0]->sinopsis = $request->sinopsis;
            }*/

            $book = DB::table('books')->where('asin', '=', $request->asin)->update(['title' => $request->title, 'title_search' => $request->title_search, 'cover' => $request->cover, 'author' => $request->author, 'sinopsis' => $request->sinopsis]);

            return $libro;
        }



        // } else {
        //     return 'Ya esta esta en la base de datos';
        // }
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
    public function store(Request $request)
    {


        $find = DB::table('books')->where('title_search', 'LIKE', "%{$request->search}%")->get();
        return $find;
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

    public function moreRating()
    {
        $books = DB::table('books')->orderBy('rating', 'desc')->limit(20)->get();
        return $books;
    }
}
