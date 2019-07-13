<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Permission $permission)
    {
        return view('admin.permissions.create_and_edit',compact('permission'));
    }

    public function store(Request $request, Permission $permission)
    {
        $permission->fill($request->all());
        $permission->save();
        return redirect()->route('permissions.index')->with('success','更新权限成功');
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


    public function edit(Permission $permission)
    {
        return view('admin.permissions.create_and_edit',compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->fill($request->all());
        $permission->save();
        Permission::findOrCreate($permission->name,$permission->guard_name?:null,$permission->remarks);
        return redirect()->route('permissions.index')->with('success','更新权限成功');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        $permission->forgetCachedPermissions();
        return redirect()->back()->with('success','删除权限成功');
    }
}
