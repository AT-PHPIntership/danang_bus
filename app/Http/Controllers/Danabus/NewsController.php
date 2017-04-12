<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    
    /**
    * Method to show all detail about news
    *
    * @param string  $slug name of news
    * @param integer $id   id of news
    *
    * @return news
    */
    public function news($slug, $id)
    {
        $news = News::find($id);
        return view('danabus.news.news', ['news' => $news]);
    }
}
