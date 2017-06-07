<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Direction;
use App\Models\Stop;
use DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$stops = Stop::with('direction','direction.routes')->get();
        return view('danabus.search.index');
    }

   /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $r = 2;
        if ($request->ajax()) {
            $lat = $request->get('lat');
            $lng = $request->get('lng'); 
            $raw = "(6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lng) 
                - radians($lng)) 
                + sin(radians($lat)) 
                * sin(radians(lat))))";
            $stops = Stop::with('direction','direction.routes')->whereRaw("{$raw} < ?", [$r])->get();
            return response()->json($stops);
        }
    }


}
