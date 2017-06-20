<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Stop;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('danabus.search.index');
    }

   /**
     * Get data from ajax
     *
     * @param \Illuminate\Http\Request $request from ajax
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $radius = config('constant.circle_radius');
        if ($request->ajax()) {
            $lat = $request->get('lat');
            $lng = $request->get('lng');
            $raw = "(6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lng) 
                - radians($lng)) 
                + sin(radians($lat)) 
                * sin(radians(lat))))";
            $stops = Stop::with('direction', 'direction.routes')->whereRaw("{$raw} < ?", [$radius])->get();
            return response()->json($stops);
        }
    }
}
