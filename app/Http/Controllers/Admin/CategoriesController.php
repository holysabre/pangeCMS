<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(Category $category)
    {
        $category->order = 0;
        $categories = Category::all();
        return view('admin.categories.create_and_edit', compact('category', 'categories'));
    }


    public function store(CategoryRequest $request, Category $category)
    {
        $category->fill($request->all());
        $category->thumb = isset($category->thumb) ? serialize($category->thumb) : '';
        $category->save();

        return redirect()->route('categories.index')->with('success','分类添加成功');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        $category->thumb = isset($category->thumb) ? unserialize($category->thumb) : '';
        $categories = Category::all();
        return view('admin.categories.create_and_edit', compact('category', 'categories'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
//        $this->authorize('update',$user);
        $data = $request->all();
        $data['thumb'] = isset($data['thumb']) ? serialize($data['thumb']) : '';
        $category->update($data);
        return redirect()->route('categories.index')->with('success', '分类更新成功！');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
