<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ColecionCarta;
use Illuminate\Support\Facades\DB;

class ColecionCartaController extends Controller
{
    public function store(Request $request){
        $Existe = DB::table('colecion_cartas')->where('CartaID', '=', $request->CartaID)->where('ColecionID', '=', $request->ColecionID)->get();
        $colecion = DB::table('coleciones')->where('code', '=', $request->ColecionID)->get();
        $idColecion = $colecion[0]->id;
        $Existe = DB::table('colecion_cartas')->where('CartaID', '=', $request->CartaID)->where('ColecionID', '=', $idColecion)->get();
        if (sizeof($Existe) == 0){
            $colecion_cartas = new ColecionCarta;
            $colecion_cartas->CartaID     = $request->CartaID;
            $colecion_cartas->ColecionID  = $idColecion;
            $colecion_cartas->save();
            return 'ok';
        }else{
            return 'ya esta';
        }
    }

    public function show($id)
    {
        $cartas = [];
        $CartasID = DB::table('colecion_cartas')->where('ColecionID', '=', $id)->get();
        foreach ($CartasID as $cartaid){
            $CARTA = DB::table('cartas')->where('id', '=', $cartaid->CartaID)->get();
            array_push($cartas, $CARTA[0]);
        }
        return $cartas;
    }
}
