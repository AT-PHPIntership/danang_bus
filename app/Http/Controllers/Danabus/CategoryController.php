<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;

class CategoryController extends Controller
{
    
    /**
     * Display the specified resource.
     *
     * @param int $id of category
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::where('category_id', '=', $id)->paginate();
        return view('danabus.index.index', ['news' => $news]);
    }
}
