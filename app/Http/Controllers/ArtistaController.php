<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artista;
use Illuminate\Support\Facades\DB;

class ArtistaController extends Controller
{


    public function index()
    {
        return DB::table('artistas')->orderBy('name', 'asc')->get();
    }

    public function store(Request $request){
        $ExisteArtista = DB::table('artistas')->where('name', '=', $request->name)->get();
        if (sizeof($ExisteArtista) == 0){
            $Artista = new Artista;
            $Artista->name          = $request->name;
            $Artista->nameSearch    = $request->nameSearch;
            $Artista->save();
            return DB::table('artistas')->where('name', '=', $request->name)->get();
        }else{
            return DB::table('artistas')->where('name', '=', $request->name)->get();
        }
    }

    public function show($id)
    {
        return DB::table('artistas')->where('id', '=', $id)->get();
    }
}
