<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a list news
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate();
        $cats = Category::all();
        return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }

    /**
     * Display the news detail
     *
     * @param int $id id of news
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('danabus.news.news', ['news' => $news]);
    }
}
