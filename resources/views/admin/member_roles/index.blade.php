@extends('admin.layouts.layout')

@section('title', '会员角色列表')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('member_roles.index') }}">会员角色管理</a></li>
                <li class="active">会员角色列表</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">会员角色列表</div>
                </div>
                <div class="panel-body">
                    <div class="table-tools" style="margin-bottom: 15px;"></div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th>名称</th>
                            <th>积分</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($member_roles as $member_role)
                            <tr>
                                <td>{{ $member_role->id }}</td>
                                <td>{{ $member_role->name }}</td>
                                <td>{{ $member_role->score }}</td>
                                <td>{{ $member_role->created_at }}</td>
                                <td>
                                    <a href="{{ route('member_roles.edit', $member_role->id) }}" class="btn btn-xs btn-primary"><i class="far fa-edit-alt"></i>编辑</a>
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