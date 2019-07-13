<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.create_and_edit',compact('role','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $data = $request->all();
        unset($data['permission']);
        $role->save($data);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index')->with('success','新增角色成功');
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


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('admin.roles.create_and_edit',compact('role','permissions'));
    }

    public function update(Request $request, Role $role)
    {
        $data = $request->all();
        unset($data['permission']);
        $role->update($data);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index')->with('success','更新角色成功');
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
