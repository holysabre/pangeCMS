<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index()
    {
        return view('admin.index.index');
    }

    public function welcome()
    {
        return view('admin.index.welcome');
    }

}
