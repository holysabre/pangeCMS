<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Menu;

class UsersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create(User $user)
    {
//        dump(Auth::user());
        return view('admin.users.create_and_edit', compact('user'));
    }


    public function store(UserRequest $request, User $user)
    {
        $user->fill($request->all());
        $user->password = Hash::make($user->password);
        $user->save();
        $user->syncRoles($request->role);
        return redirect()->route('users.index')->with('success','新增管理员成功');
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

    public function edit(User $user)
    {
//        dump($user->hasPermissionTo('manage_users'));

        $roles = Role::all();
        return view('admin.users.create_and_edit', compact('user','roles'));
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();

        $data['password'] = empty($request->password) ? $user->password : Hash::make($request->password);
        $user->update($data);
        $user->syncRoles($request->role);
        return redirect()->back()->with('success','更新管理员成功');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success','删除管理员成功');
    }
}
