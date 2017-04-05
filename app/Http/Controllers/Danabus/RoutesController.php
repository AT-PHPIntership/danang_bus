<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Route;

class RoutesController extends Controller
{
    public function routes(){
        $ngoaithanh = DB::table('routes')->where('type', '=',1)->get();
        $noithanh = DB::table('routes')->where('type', '=',0)->get();
    	return view('danabus.routes.tuyen',['ngoaithanh' => $ngoaithanh, 'noithanh' => $noithanh]);
    }
    public function tuyencontent($slug, $id){
    	$routes = Route::find($id);
    	return view('danabus.routes.tuyencontent',['routes' => $routes]);
    }
}
