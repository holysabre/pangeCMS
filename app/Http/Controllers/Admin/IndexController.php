<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        $menus = Menu::get()->toTree();
        return view('admin.index.index', compact('menus'));
    }

    public function welcome()
    {
        return view('admin.index.welcome');
    }

}
