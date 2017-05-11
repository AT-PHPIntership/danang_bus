<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Session;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks= Feedback::orderBy('id', 'DESC')->paginate();
        return view('admin.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id feedback
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('admin.feedbacks.edit', compact('feedback'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     * @param int                      $id      feedback
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        Feedback::findOrFail($id)->update($input);
        Session::flash('success', trans('messages.feedback_reply_success'));
        return redirect()->route('admin.feedbacks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id feedback
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feedback::findOrFail($id)->delete();
        Session::flash('success', trans('messages.feedback_delete_success'));
        return redirect()->route('admin.feedbacks.index');
    }
}
