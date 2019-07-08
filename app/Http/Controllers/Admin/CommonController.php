<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Handlers\ImageUploadHandler;

class CommonController extends Controller
{

    public function upload(Request $request, ImageUploadHandler $upload)
    {
        if($request->file){
            $result = $upload->save($request->file, $request->folder);
            return response()->json($result);
        }
        return response()->json(['result'=>'failed','message'=>'未上传文件']);
    }

}
