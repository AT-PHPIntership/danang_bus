<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class NewsController extends Controller
{
    /**
    * Show news content
    *
    * @param integer $id id of news
    *
    * @return news content page
    */
    public function news($id)
    {
        $news = News::find($id);
        return view('danabus.news.news', ['news' => $news]);
    }
}
