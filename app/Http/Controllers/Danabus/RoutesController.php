<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Route;
use App\Models\Directions;

class RoutesController extends Controller
{

    /**
    * Method to show all routes
    *
    * @return routes
    */
    public function routes()
    {
        $supurban = Route::where('type', '=', 1)->get();
        $urban = Route::where('type', '=', 0)->get();
        return view('danabus.routes.routes', ['supurban' => $supurban, 'urban' => $urban]);
    }
    
    /**
    * Method to show all detail about route
    *
    * @param string $slug name of route
    * @param integer $id id of route
    *
    * @return product
    */
    public function routescontent($slug, $id)
    {
        $directions=Directions::join('stops', 'directions.stop_id', '=', 'stops.id')->where('route_id', '=', $id)->get();
        $routes = Route::find($id);
        return view('danabus.routes.routescontent', ['routes' => $routes, 'directions' => $directions]);
    }
}
