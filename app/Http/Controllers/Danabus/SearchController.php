<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
    * Show search form and map
    *
    * @return search page
    */
    public function search()
    {
        return view('danabus.search.search');
    }
}
