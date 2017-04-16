<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller
{
    

    /**
     * Display the specified resource.
     *
     * @param int $id of news
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('danabus.news.news', ['news' => $news]);
    }
}
