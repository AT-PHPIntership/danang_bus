<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Route;
use App\Models\Direction;

class RoutesController extends Controller
{
    /**
    * Show list routes
    *
    * @return routes page
    */
    public function routes()
    {
        $supurban = DB::table('routes')->where('type', '=', 1)->get();
        $urban = DB::table('routes')->where('type', '=', 0)->get();
        return view('danabus.routes.routes', ['supurban' => $supurban, 'urban' => $urban]);
    }
    /**
    * Show routes content
    *
    * @param integer $id id of routes
    *
    * @return routes content page
    */
    public function routescontent($id)
    {
        $directions=DB::table('directions')->join('stops', 'directions.stop_id', '=', 'stops.id')->where('route_id', '=', $id)->get();
        $routes = Route::find($id);
        return view('danabus.routes.routescontent', ['routes' => $routes, 'directions' => $directions]);
    }
}
