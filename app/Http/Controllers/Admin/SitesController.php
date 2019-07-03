<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SiteRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Site;

class SitesController extends Controller
{

    public function index()
    {
        $config_section = config('sites.section');

        $sites = Site::all();

        $sites = $sites->groupBy('section')->all();

//        dump($sites);

        return view('admin.sites.create_and_edit', compact('config_section', 'sites'));
    }

    public function save(SiteRequest $request)
    {

    }

}
