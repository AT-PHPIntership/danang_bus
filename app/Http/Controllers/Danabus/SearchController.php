<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Route;


class SearchController extends Controller
{
    public function index(){
    	return view('danabus.search.index');
    }

    public function search(Request $request){
    	if ($request->ajax()) {
    		$route_id = $request->get('$route_id');
    		$status = $request->get('$status');
    		$route = Route::with(['directions' => function ($query) use ($route_id, $status){
            return $query->where('status','=',$status);
        },'directions.stop'])->findOrFail($route_id);
         return response()->json($route );
    	}

    	
    }
}
