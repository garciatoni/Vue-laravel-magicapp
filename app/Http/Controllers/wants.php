<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Want;
use Illuminate\Support\Facades\DB;

class wants extends Controller
{
    public function create(Request $request, $id)
    {
        $want = new Want;
        $want->titulo         = $request->titulo;
        $want->descripcion    = $request->descripcion;
        $want->user_id        = $id;
        $want->save();
        return $want;
    }

    public function index($id)
    {
        return DB::table('wants')->where('user_id', '=', "$id")->get();
    }

}
