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
    * @param [type] $slug [slug event]
    * @param [type] $id   [id event]
    *
    * @return news content page
    */
    public function news($slug, $id)
    {
        $news = News::find($id);
        return view('danabus.news.news', ['news' => $news]);
    }
}
