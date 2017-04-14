<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Route;
use App\Http\Requests\RouteRequest;
use Session;

class RouteController extends Controller
{
    /**
     * Display a listing of the route
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::paginate();
        return view('admin.routes.index', ['routes'=>$routes]);
    }

    /**
     * Show the form for creating a new route
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.routes.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request input value
     *
     * @return \Illuminate\Http\Response
     */
    public function store(RouteRequest $request)
    {

        $route = new Route($request->all());
        $route->save();
        Session::flash('success', trans('message.add_success'));
        return redirect()->route('routes.index');
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
        $route = Route::findOrFail($id);
        return view('admin.routes.edit', compact('route', $route));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request delete
     * @param int                      $id      of route
     *
     * @return \Illuminate\Http\Response
     */
    public function update(RouteRequest $request, $id)
    {
        Route::findOrFail($id)->update($request->all());
        Session::flash('success', trans('message.edit_success'));
        return redirect()->route('routes.index');
    }

    /**
     * Remove the route resource from list route.
     *
     * @param int $id of route
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Route::findOrFail($id)->delete();
        Session::flash('success', trans('message.delete_success'));
        return redirect()->route('routes.index');
    }
}
