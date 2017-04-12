<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoutesController extends Controller
{
    public function routes(){
    	return view('danabus.routes.tuyen');
    }
    public function tuyencontent(){
    	return view('danabus.routes.tuyencontent');
    }
}
