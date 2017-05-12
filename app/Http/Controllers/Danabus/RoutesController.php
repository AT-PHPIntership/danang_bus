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
        $municipal = Route::where('type', '=', config('constants.INTER_MUNICIPAL_DEFAULT'))
        ->get();
        $urban = Route::where('type', '=', config('constants.URBAN_DEFAULT'))->get();
        return view('danabus.routes.routes', ['municipal' => $municipal, 'urban' => $urban]);
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
        $directions=Directions::where('route_id', '=', $id)->stop();
        $routes = Route::find($id);
        return view('danabus.routes.routescontent', ['routes' => $routes, 'directions' => $directions]);
    }
}
