<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Http\Requests\FeedbackRequest;
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
        $feedbacks = Feedback::orderBy('id', 'DESC')->paginate();
        return view('danabus.feedbacks.index', compact('feedbacks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of form
     *
     * @return \Illuminate\Http\Response
     */
    public function store(FeedbackRequest $request)
    {
        $feedback = new Feedback($request->all());
        $feedback ->save();
        Session::flash('success', trans('messages.feedback_send_success'));
        return redirect()->route('feedbacks.index');
    }
}
