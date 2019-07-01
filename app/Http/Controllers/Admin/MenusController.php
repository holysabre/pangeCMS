<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MenuRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenusController extends Controller
{

    public function index()
    {
        return view('admin.menus.index');
    }

    public function data(Request $request, Menu $menu)
    {
//        $menus = $menu->allTreeList();
        $menus = $this->traverseTree();
        $count = Menu::all()->count();
        $data = [
            'code' => 0,
            'msg'   => '正在请求中...',
            'count' => $count,
            'data'  => $menus
        ];
        return response()->json($data);
    }


    public function create(Menu $menu)
    {
        $menus = $this->traverseTree();
        $menu->order = 0;
        return view('admin.menus.create_and_edit', compact('menu', 'menus'));
    }


    public function store(MenuRequest $request, Menu $menu)
    {
        $menu->fill($request->all());
        $menu->save();

        return redirect()->route('menus.index')->with('success', '菜单添加成功');
    }

    public function show($id)
    {
        //
    }

    public function edit(Menu $menu)
    {
        $menus = $this->traverseTree();
        return view('admin.menus.create_and_edit', compact('menu', 'menus'));
    }

    public function update(MenuRequest $request, Menu $menu)
    {
        $menu->update($request->all());

        return redirect()->route('menus.index')->with('success', '菜单修改成功');
    }

    public function destroy(Menu $menu)
    {
        dd($menu);
//        $menu->delete();
        $data = [
            'code' => 0,
            'msg'   => '正在请求中...',
            'count' => 0,
            'data'  => ''
        ];
        return response()->json($data);
    }

    public function traverseTree()
    {
        $trees = collect();
        $nodes = Menu::get()->toTree();
        $traverse = function ($categories, $prefix = '') use (&$traverse, $trees) {
            foreach ($categories as $category) {
//                echo PHP_EOL.$prefix.' '.$category->name;
                $category->name_show = $prefix.' '.$category->name;
                if(!$trees->contains($category)){
                    $trees->push($category);
                }
                $traverse($category->children, $prefix.'——');
            }
        };
        $traverse($nodes);
        return $trees;
    }
}
