<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Category;

class CategoryController extends Controller
{
    
    /**
     * Display the index show list news of Category
     *
     * @param int $id id of Category
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('category_id', '=', $id)->paginate(config('constants.LIMIT_NEWS_INDEX'));
        $cats = Category::all();
        return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }
}
