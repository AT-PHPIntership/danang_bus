<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
    	return view('danabus.index.index');
    }
}
