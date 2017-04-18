<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Http\Requests\NewsPostRequest;
use Session;
use Storage;
use File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id', 'DESC')->with('category', 'user')->paginate();
        return view('admin.news.index', compact('news'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of news
     *
     * @return \Illuminate\Http\Response
     */
    public function store(NewsPostRequest $request)
    {

        $news = new News($request->all());
        $news ->user_id = Auth()->user()->id;
        if ($request->hasFile('picture_path')) {
            $news ->picture_path= $request->picture_path->hashName();
            $request->file('picture_path')->move(config('constant.path_upload'), $news ->picture_path);
            $result = $news ->save();
            if ($result) {
                Session::flash('success', trans('messages.news_create_success'));
                 return redirect()->route('admin.news.index');
            } else {
                 Session::flash('success', trans('messages.news_create_errors'));
                return redirect()->route('admin.news.create');
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy($id)
    // {
    //     //
    // }
}
