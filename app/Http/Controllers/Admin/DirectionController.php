<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Directions;
use Session;
use App\Http\Requests\DirectionRequest;

class DirectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $directions = Directions::orderBy('route_id', 'DESC')->paginate();
        return view('admin.directions.index', ['directions' => $directions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.directions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     *
     * @return \Illuminate\Http\Response
     */
    public function store(DirectionRequest $request)
    {
        $direction = new Directions($request->all());
        $direction ->save();
        Session::flash('success', trans('messages.direction_create_success'));
        return redirect()->route('admin.directions.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of direction
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direction = Directions::where('id', '=', $id)->get();
        return view('admin.directions.edit', ['direction' => $direction]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     * @param int                      $id      of direction
     *
     * @return \Illuminate\Http\Response
     */
    public function update(DirectionRequest $request, $id)
    {
        Directions::findOrFail($id)->update($request->all());
        Session::flash('success', trans('messages.direction_edit_success'));
        return redirect()->route('admin.directions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id of direction
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Directions::findOrFail($id)->delete();
        Session::flash('success', trans('messages.direction_delete_success'));
        return redirect()->route('admin.directions.index');
    }
}
