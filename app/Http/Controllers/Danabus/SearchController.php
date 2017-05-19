<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\Direction;

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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $id = $request->get('$route_id');
            $status = $request->get('$status');
            $condition = ['status' => $status, 'route_id' => $id];
            $directions = Direction::where($condition)->with('stop')->get();
            return response()->json($directions);
        }
    }
}
