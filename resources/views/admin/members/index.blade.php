@extends('admin.layouts.layout')

@section('title', '会员列表')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('members.index') }}">会员管理</a></li>
                <li class="active">会员列表</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">会员列表</div>
                </div>
                <div class="panel-body">
                    <div class="table-tools" style="margin-bottom: 15px;">
                        <div class="tools-group">
                            <a href="{{ route('members.create') }}" class="btn btn-primary"><i class="icon icon-plus-sign"></i> 新增</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="50"><a href="{{ Request::url() }}?order=id">ID</a></th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>手机号</th>
                            <th>上级人</th>
                            <th>产品库存</th>
                            <th><a href="{{ Request::url() }}?order=member_role">角色</a></th>
                            <th>会员码</th>
                            <th><a href="{{ Request::url() }}?order=default">创建时间</a></th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $sex[$member->sex] }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->parent_id }} 张三 （123）</td>
                                <td>0</td>
                                <td>{{ $member->member_role->name }}</td>
                                <td><a href="">查看</a> <a href="">下载</a></td>
                                <td>{{ $member->created_at }}</td>
                                <td>
                                    <a href="{{ route('members.show', $member->id) }}" class="btn btn-xs btn-primary"><i class="far fa-edit-alt"></i>详情</a>
                                    <form action="{{ route('members.change', [$member->id,'status'=>$member->status == 'active' ? 'freeze' : 'active']) }}" method="post"
                                          style="display: inline-block;"
                                          onsubmit="return confirm('您确定要{{ $member->status == 'active' ? '冻结' : '解冻' }}吗？');">
                                        {{ csrf_field() }}
                                        {{ method_field('PUT') }}
                                        <button type="submit" class="btn btn-xs btn-{{ $member->status == 'active' ? 'success' : 'danger' }}">
                                            <i class="far fa-trash-alt"></i> {{ $status[$member->status] }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="mt-5">
                        {!! $members->appends(Request::except('page'))->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop