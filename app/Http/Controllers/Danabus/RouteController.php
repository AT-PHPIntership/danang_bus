<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Route;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interprovincial = Route::where('type', '=', \App\Models\Route::TYPE_INTERPROVINCIAL)
        ->get();
        $innercity = Route::where('type', '=', \App\Models\Route::TYPE_INNER_CITY)->get();
        return view('danabus.routes.index', ['interprovincial' => $interprovincial, 'innercity' => $innercity]);
    }


    /**
     * Display the specified resource.
     *
     * @param int $id route
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //
    }
}
