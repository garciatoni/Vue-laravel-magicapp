<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use App\Models\Artista;
use App\Models\ArtistaCarta;
use Illuminate\Support\Facades\DB;


class ArtistaCartaController extends Controller
{
    public function store(Request $request){
        $Existe = DB::table('artista_cartas')->where('CartaID', '=', $request->CartaID)->where('ArtistaID', '=', $request->ArtistaID)->get();
        if (sizeof($Existe) == 0){
            $ArtistaCarta = new ArtistaCarta;
            $ArtistaCarta->CartaID          = $request->CartaID;
            $ArtistaCarta->ArtistaID    = $request->ArtistaID;
            $ArtistaCarta->save();
            return $ArtistaCarta;
        }
    }



    public function show($id)
    {
        $cartas = [];
        $CartasID = DB::table('artista_cartas')->where('ArtistaID', '=', $id)->get();
        foreach ($CartasID as $cartaid){
            $CARTA = DB::table('cartas')->where('id', '=', $cartaid->CartaID)->get();
            array_push($cartas, $CARTA[0]);
        }
        return $cartas;
    }
}
