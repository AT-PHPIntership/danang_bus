<?php

namespace App\Http\Controllers\Danabus;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Category;

class IndexController extends Controller
{
    public function index(){

    	$news = News::paginate(config('constants.LIMIT_NEWS_INDEX'));
        $cats = DB::table('categories')->get();
    	return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }
    public function filter($id){
        $news = DB::table('news')->where('category_id', '=' ,$id)->paginate(config('constants.LIMIT_NEWS_INDEX'));
        $cats = DB::table('categories')->get();
        return view('danabus.index.index', ['news' => $news, 'cats' =>$cats]);
    }
    
}
