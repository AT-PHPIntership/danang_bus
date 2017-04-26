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
        $route = $request->only(['name','distance','frequency','frequency_peak','start_time','end_time','type']);
         DB::transaction(function () use ($route, $allRequest) {
            $newroute = new Route($route);
            $newroute->save();

            for ($i=0; $i<count($allRequest['order_forwardtrip']); $i++) {
                $forwardtrip = new Direction([
                            "order" => $allRequest['order_forwardtrip'][$i],
                            "stop_id" => $allRequest['stop_id_forwardtrip'][$i],
                            "fee" => $allRequest['fee_forwardtrip'][$i],
                            "time" => $allRequest['time_forwardtrip'][$i],
                            "status" => \App\Models\Direction::STATUS_FORWARD_TRIP,
                            "route_id" => $newroute->id
                        ]);
                $forwardtrip->save();
            }
            for ($i=0; $i<count($allRequest['order_backwardtrip']); $i++) {
                $backwardtrip = new Direction([
                            "order" => $allRequest['order_forwardtrip'][$i],
                            "stop_id" => $allRequest['stop_id_forwardtrip'][$i],
                            "fee" => $allRequest['fee_forwardtrip'][$i],
                            "time" => $allRequest['time_forwardtrip'][$i],
                            "status" => \App\Models\Direction::STATUS_BACKWARD_TRIP,
                            "route_id" => $newroute->id
                        ]);
                $backwardtrip->save();
            }
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
        Route::findOrFail($id)->update($request->all());
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
        Route::findOrFail($id)->delete();
        Session::flash('success', trans('messages.route_delete_success'));
        return redirect()->route('admin.routes.index');
    }
}
