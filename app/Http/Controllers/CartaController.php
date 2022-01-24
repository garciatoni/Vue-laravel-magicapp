<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carta;
use Illuminate\Support\Facades\DB;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return DB::table('cartas')->where('nameSearch', 'LIKE', "%{$request->search}%")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ExisteCarta = DB::table('cartas')->where('id_carta', '=', $request->id_carta)->get();

        if (sizeof($ExisteCarta) == 0)
        {
            $Carta = new Carta;
            $Carta->name             = $request->name;
            $Carta->manaCost         = $request->manaCost;
            $Carta->cmc              = $request->cmc;

            if(isset($request->color)){
                $colors = $request->color;
                $color = '';
                for ($x=0; $x<count($colors); $x++){
                    $color = $request->color[$x].' '.$color;
                }
                $Carta->color = $color;
            }

            if(isset($request->legalities)){
                $legalitie = $request->legalities;
                $legalities = '';
                for ($x=0; $x<count($legalitie); $x++){
                    $legalities = $request->legalities[$x].' '.$legalities;
                }
                $Carta->legalities = $legalities;
            }

            if(isset($request->colorIdentity)){
                $colorIdentit = $request->colorIdentity;
                $colorIdentity = '';
                for ($x=0; $x<count($colorIdentit); $x++){
                    $colorIdentity = $request->colorIdentity[$x].' '.$colorIdentity;
                }
                $Carta->colorIdentity = $colorIdentity;
            }

            if(isset($request->supertypes)){
                $supertype = $request->supertypes;
                $supertypes = '';
                for ($x=0; $x<count($supertype); $x++){
                    $supertypes = $request->supertypes[$x].' '.$supertypes;
                }
                $Carta->supertypes = $supertypes;
            }

            if(isset($request->types)){
                $type = $request->types;
                $types = '';
                for ($x=0; $x<count($type); $x++){
                    $types = $request->types[$x].' '.$types;
                }
                $Carta->types = $types;
            }

            if(isset($request->subtypes)){
                $subtype = $request->subtypes;
                $subtypes = '';
                for ($x=0; $x<count($subtype); $x++){
                    $subtypes = $request->subtypes[$x].' '.$subtypes;
                }
                $Carta->subtypes = $subtypes;
            }

            $Carta->rarity           = $request->rarity;
            $Carta->set_id           = $request->set_id;
            $Carta->text	            = $request->text;
            $Carta->originalText     = $request->originalText;
            $Carta->flavor           = $request->flavor;
            $Carta->artist_id        = $request->artist_id;
            $Carta->number           = $request->number;
            $Carta->power	        = $request->power;
            $Carta->toughness	    = $request->toughness;
            $Carta->layout           = $request->layout;

            if(isset($request->multiverse_id)){
                $Carta->multiverse_id	= $request->multiverse_id;
            }

            $Carta->imageURL	        = $request->imageURL;
            $Carta->id_carta	        = $request->id_carta;
            $Carta->nameSearch	    = $request->nameSearch;

            $Carta->save();
            return DB::table('cartas')->where('id_carta', '=', $request->id_carta)->get();
        }else{
            return DB::table('cartas')->where('id_carta', '=', $request->id_carta)->get();
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
        return DB::table('cartas')->where('id', '=', $id)->get();
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
    public function destroy($id)
    {
        //
    }
}
