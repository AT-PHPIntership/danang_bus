<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeedbackController extends Controller
{
    /**
    * Show form feedback
    *
    * @return feedback page
    */
    public function feedback()
    {
        return view('danabus.feedback.feedback');
    }
}
