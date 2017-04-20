<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;
use App\Http\Requests\NewsPostRequest;
use App\Http\Requests\NewsPutRequest;
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
            $request->file('picture_path')->move(config('constant.path_upload_news'), $news ->picture_path);
        }
        $result = $news ->save();
        if ($result) {
            Session::flash('success', trans('messages.news_create_success'));
            return redirect()->route('admin.news.index');
        } else {
            Session::flash('success', trans('messages.news_create_errors'));
            return redirect()->route('admin.news.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id of news
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        $news =  News::findOrFail($id);
        return view('admin.news.edit', compact('news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of news
     * @param int                      $id      of news
     *
     * @return \Illuminate\Http\Response
     */
    public function update(NewsPutRequest $request, $id)
    {
        $news = News::findOrFail($id);
        $picturePathOld = $news['picture_path'];
        $news ->user_id = $news->user->id;
        $news->fill($request->all());
        if ($request->hasFile('picture_path')) {
            $news ->picture_path= $request->picture_path->hashName();
            $request->file('picture_path')->move(config('constant.path_upload_news'), $news ->picture_path);
            unlink(config('constant.path_upload_news').$picturePathOld);
        }
        $result= $news->update();
        if ($result) {
            Session::flash('success', trans('messages.news_edit_success'));
            return redirect()->route('admin.news.index');
        } else {
            Session::flash('success', trans('messages.news_edit_success'));
            return redirect()->route('admin.news.create');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id of news
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        unlink(config('constant.path_upload_news').$news['picture_path']);
        $news->delete($id);
        Session::flash('success', trans('messages.news_delete_success'));
        return redirect()->route('admin.news.index');
    }
}
