<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rebate;
use App\Models\MemberRole;

class RebatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = config('member.group');
        $rebates = Rebate::all()->groupBy('member_group');
        $member_roles = MemberRole::all()->groupBy('group');
        return view('admin.rebates.index',compact('rebates','member_roles','groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function edit(Rebate $rebate)
    {
        $groups = config('member.group');
        return view('admin.rebates.create_and_edit',compact('rebate','groups'));
    }

    public function update(Request $request, Rebate $rebate)
    {
        $rebate->fill($request->all());
        $rebate->save();
        return redirect()->route('rebates.index')->with('success','修改返佣制度成功');
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
