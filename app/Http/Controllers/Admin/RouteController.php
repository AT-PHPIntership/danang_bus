<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Models\Stop;
use App\Models\Direction;
use App\Http\Requests\RouteRequest;
use Illuminate\Support\Facades\DB;
use Session;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::orderBy('id', 'DESC')->paginate();
        return view('admin.routes.index', ['routes'=>$routes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.routes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {
        $allRequest = $request->all();
         DB::transaction(function () use ($allRequest) {
            $newRoute = new Route($allRequest);
            $newRoute->save();
            $this->addDirection($allRequest, $newRoute);
         });
        Session::flash('success', trans('messages.route_create_success'));
        return redirect()->route('admin.routes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of route
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $routes = Route::where('id', '=', $id)->with(['directions' => function ($query) {
            return $query->orderBy('order');
        },'directions.stop'])->get();
        return view('admin.routes.edit', ['routes'=> $routes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     * @param int                      $id      of route
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RouteRequest $request, $id)
    {
        $allRequest = $request->all();
        
        DB::transaction(function () use ($allRequest, $id) {
            $route = Route::findOrFail($id);
            $route->update($allRequest);
            $route->directions()->delete();
            $this->addDirection($allRequest, $route);
        });
        Session::flash('success', trans('messages.route_edit_success'));
        return redirect()->route('admin.routes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id route
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Route::where('id', '=', $id)->with('directions')->delete();
        Session::flash('success', trans('messages.route_delete_success'));
        return redirect()->route('admin.routes.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $allRequest of form
     * @param int                      $route      of route
     *
     * @return \Illuminate\Http\Response
     */
    public function addDirection($allRequest, $route)
    {

        for ($i=0; $i<count($allRequest['stop_id_forward']); $i++) {
            $forwardStop = new Direction([
                "order" => $i,
                "stop_id" => $allRequest['stop_id_forward'][$i],
                "fee" => $allRequest['fee_forward'][$i],
                "time" => $allRequest['time_forward'][$i],
                "status" => \App\Models\Direction::STATUS_FORWARD,
            ]);
            $route->directions()->save($forwardStop);
        }
        for ($i=0; $i<count($allRequest['stop_id_backward']); $i++) {
            $backwardStop = new Direction([
                "order" => $i,
                "stop_id" => $allRequest['stop_id_backward'][$i],
                "fee" => $allRequest['fee_backward'][$i],
                "time" => $allRequest['time_backward'][$i],
                "status" => \App\Models\Direction::STATUS_BACKWARD,
            ]);
            $route->directions()->save($backwardStop);
        }
    }
}
