<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\News;
use App\Models\Category;

class IndexController extends Controller
{
    /**
    * Show list all news
    *
    * @return index page
    */
    public function index()
    {

        $news = News::paginate(config('constants.LIMIT_NEWS_INDEX'));
        $cats = DB::table('categories')->get();
        return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }
    /**
    *  Filter by category
    *
    * @param [type] $id [id event]
    *
    * @return index page
    */
    public function filter($id)
    {
        $news = DB::table('news')->where('category_id', '=', $id)->paginate(config('constants.LIMIT_NEWS_INDEX'));
        $cats = DB::table('categories')->get();
        return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }
}
