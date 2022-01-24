<?php

namespace App\Http\Controllers;

use App\Models\deck;
use App\Models\cards_deck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return DB::table('decks')->where('user_id', '=', "$id")->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $deck = new deck;
        $deck->titulo         = $request->titulo;
        $deck->formato        = $request->formato;
        $deck->descripcion    = $request->descripcion;
        $deck->privado        = $request->privado;
        $deck->prototipo      = $request->prototipo;
        $deck->user_id        = $id;
        $deck->save();
        return $deck;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\deck  $deck
     * @return \Illuminate\Http\Response
     */
    public function show(deck $deck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\deck  $deck
     * @return \Illuminate\Http\Response
     */
    public function edit(deck $deck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\deck  $deck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, deck $deck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\deck  $deck
     * @return \Illuminate\Http\Response
     */
    public function destroy(deck $deck)
    {
        //
    }
}
