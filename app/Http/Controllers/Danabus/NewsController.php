<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    public function news($slug, $id){
    	$news = News::find($id);
    	return view('danabus.news.news', ['news' => $news]);
    }
}
