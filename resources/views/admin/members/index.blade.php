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
                            <th width="50">ID</th>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>角色</th>
                            <th>手机号码</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($members as $member)
                            <tr>
                                <td>{{ $member->id }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->sex }}</td>
                                <td>{{ $member->member_role_id }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>{{ $member->created_at }}</td>
                                <td>
                                    <a href="{{ route('members.edit', $member->id) }}" class="btn btn-xs btn-primary"><i class="far fa-edit-alt"></i>编辑</a>
                                    <form action="{{ route('members.destroy', $member->id) }}" method="post"
                                          style="display: inline-block;"
                                          onsubmit="return confirm('您确定要删除吗？');">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-xs btn-danger">
                                            <i class="far fa-trash-alt"></i> 删除
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop