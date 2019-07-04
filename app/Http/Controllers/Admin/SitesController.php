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
        $data = $request->all();

        unset($data['_token']);

        foreach ($data as $key => $value){
            if($site = Site::find($key)){
                if($site->value != $value){
                    $site->value = $value;
                    $site->save();
                }
            }
        }

        return redirect()->back()->with('success','站点信息更新成功');
    }

}
