<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Member;

class MembersController extends Controller
{

    public function index(Request $request, Member $member)
    {
        $sex = config('member.sex');
        $status = config('member.status');
        $members = $member->withOrder($request->order)->paginate(10);
        return view('admin.members.index',compact('members','sex','status'));
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

    public function show(Member $member)
    {
        return view('admin.members.show',compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

    /**
     * @param Request $request
     * @param Member $member
     * @return \Illuminate\Http\RedirectResponse
     * 改变会员的状态 活跃/冻结
     */
    public function change(Request $request, Member $member)
    {
        $member->status = $request->status;
        $member->save();
        return redirect()->back()->with('success','操作成功');
    }

    /**
     * @param Request $request
     * @param Member $member
     * @return \Illuminate\Http\RedirectResponse
     * 设置上级会员
     */
    public function setParent(Request $request, Member $member)
    {
        if(!empty($member->parent)){
            return redirect()->back()->with('danger','已存在上级会员');
        }
        $member->parent_id = $request->parent_id;
        $member->save();
        return redirect()->back()->with('设置上级会员成功');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * 获取上级会员的名字
     */
    public function getName(Request $request)
    {
        $parent = Member::find($request->parent_id);
        if($parent){
            $response = ajax_response('存在会员ID',1,['name' => $parent->name]);
        }else{
            $response = ajax_response('不存在的会员ID');
        }
        return response()->json($response);
    }
}
