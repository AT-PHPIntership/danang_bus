<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Session;
use App\Http\Requests\UserPostRequest;
use App\Http\Requests\UserPutRequest;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of users
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserPostRequest $request)
    {
        $user = new User($request->all());
        $user ->password = bcrypt($request->password);
        $user ->save();
        Session::flash('success', trans('messages.users_create_success'));
        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == Auth()->user()->id) {
            $user = User::findOrFail($id);
            return view('admin.users.edit', compact('user'));
        } else {
            Session::flash('errors', trans('messages.users_edit_no'));
            return view('admin.users.index');
        }
    }

    /**
     * Update the specified resource in storae.
     *
     * @param \Illuminate\Http\Request $request of users
     * @param int                      $id      of user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UserPutRequest $request, $id)
    {
        $user = User::findOrFail($id);
        if (Hash::check($request->oldpassword, $user->password)) {
            if ($request->newpassword) {
                $user->password = bcrypt($request->newpassword);
            }
            $user->fill($request->all());
            $user->save();
            Session::flash('success', trans('messages.users_edit_success'));
            return redirect()->route('admin.users.index');
        } else {
            Session::flash('errors', trans('messages.users_edit_errors'));
            return redirect()->route('admin.users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
