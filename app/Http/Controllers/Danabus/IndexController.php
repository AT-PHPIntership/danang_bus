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
    * Show index
    *
    * @return index page
    */
    public function index()
    {

        $news = News::paginate(config('constants.LIMIT_NEWS_INDEX'));
        $cats = Category::all();
        return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }

    /**
    * Method to show all news of category
    *
    * @param string $slug name of category
    * @param integer $id id of category
    *
    * @return index page
    */
    public function filter($slug,$id)
    {
        $news = News::where('category_id', '=', $id)->paginate(config('constants.LIMIT_NEWS_INDEX'));
        $cats = Category::all();
        return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }
}
