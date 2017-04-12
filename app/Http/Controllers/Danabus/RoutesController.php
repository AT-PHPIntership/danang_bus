<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Directions;

class RoutesController extends Controller
{
    /**
     * Show list routes
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supurban = Route::where('type', '=', 1)->get();
        $urban = Route::where('type', '=', 0)->get();
        return view('danabus.routes.routes', ['supurban' => $supurban, 'urban' => $urban]);
    }

    /**
     * Show the route detail
     *
     * @param int $id id of route
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $directions=Directions::join('stops', 'directions.stop_id', '=', 'stops.id')
        ->where('route_id', '=', $id)->get();
        $routes = Route::find($id);
        return view('danabus.routes.routescontent', ['routes' => $routes, 'directions' => $directions]);
    }
}
