<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feedback;

class AdminController extends Controller
{

    /**
     * Display the page admin home
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks= Feedback::orderBy('id', 'DESC')->paginate();
        return view('admin.layouts.index', compact('feedbacks'));
    }
}
