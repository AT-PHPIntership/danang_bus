<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Stop;
use App\Http\Requests\StopRequest;
use Session;

class StopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stops = Stop::orderBy('id', 'DESC')->paginate();
        return view('admin.stops.index', ['stops' => $stops]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StopRequest $request)
    {
        $stop = new Stop($request->all());
        $stop ->save();
        Session::flash('success', trans('messages.stop_create_success'));
        return redirect()->route('admin.stops.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of stop
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stop = Stop::findOrFail($id);
        return view('admin.stops.edit', ['stop' => $stop]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     * @param int                      $id      of stop
     *
     * @return \Illuminate\Http\Response
     */
    public function update(StopRequest $request, $id)
    {
        Stop::findOrFail($id)->update($request->all());
        Session::flash('success', trans('messages.stop_edit_success'));
        return redirect()->route('admin.stops.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id of stop
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stop::findOrFail($id)->delete();
        Session::flash('success', trans('messages.stop_delete_success'));
        return redirect()->route('admin.stops.index');
    }
}
