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
        $interprovincial = Route::interprovincial()->get();
        $innercity = Route::innercity()->get();
        return view('danabus.routes.index', ['interprovincial' => $interprovincial, 'innercity' => $innercity]);
    }

    /**
     * Display the specified resource.
     *
     *  @param int $id of route
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = Route::with('backwardDirections', 'forwardDirections', 'forwardDirections.stop', 'backwardDirections.stop')->findOrFail($id);
        $forwardDirections = $route->forwardDirections;
        $backwardDirections = $route->backwardDirections;
        return view('danabus.routes.show', compact('route', 'forwardDirections', 'backwardDirections'));
    }
}
