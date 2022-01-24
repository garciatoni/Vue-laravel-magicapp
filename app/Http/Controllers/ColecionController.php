<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colecion;
use Illuminate\Support\Facades\DB;

class ColecionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DB::table('coleciones')->whereIn('type', array('core', 'expansion'))->orderBy('releaseDate', 'desc')->get();
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
    public function store(Request $request)
    {
        $ExisteColecion = DB::table('coleciones')->where('code', '=', $request->code)->get();
        if (sizeof($ExisteColecion) == 0)
        {
            $Colecion = new Colecion;
            $Colecion->code = $request->code;
            $Colecion->name = $request->name;
            $Colecion->type = $request->type;
            if (isset($request->block))
            {
                $Colecion->block	 = $request->block;
            }
            $Colecion->releaseDate = $request->releaseDate;
            $Colecion->nameSearch = $request->nameSearch;
            $Colecion->save();
            return $Colecion;
        }else{
            if(isset($request->logo)){
                DB::table('coleciones')->where('code', '=', $request->code)->update(['logo' => $request->logo, 'NumCartas' => $request->NumCartas]);
                return DB::table('coleciones')->where('code', '=', $request->code)->get();
            }else{
                DB::table('coleciones')->where('code', '=', $request->code)->update(['NumCartas' => $request->NumCartas]);
                return DB::table('coleciones')->where('code', '=', $request->code)->get();
            }


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
        return DB::table('coleciones')->where('id', '=', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show2($id)
    {
        return DB::table('coleciones')->where('code', '=', $id)->get();
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

    }
}
