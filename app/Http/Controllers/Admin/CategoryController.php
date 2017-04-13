<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Session;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::orderBy('id', 'DESC')->paginate(config('constant.LIMIT_PAGE_ADMIN'));
        return view('admin.categories.list', compact('data', $data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request of category
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $data = new Category;
        $data ->name = $request ->txtTitle;
        $data ->save();
        Session::flash('msg', 'Add success !');
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id of category
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataCategory = Category::find($id);
        return view('admin.categories.edit', compact('dataCategory', $dataCategory));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request of category
     * @param int                      $id      of category
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataCategory = Category::find($id);
        $dataCategory ->name = $request->txtTitle;
        $dataCategory -> save();
        Session::flash('msg', 'Update success !');
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id of category
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataCategory = Category::find($id);
        $dataCategory ->delete($id);
        Session::flash('msg', 'Delete success !');
        return redirect()->route('categories.index');
    }
}
