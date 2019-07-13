@extends('admin.layouts.layout')

@section('title', '管理员列表')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon icon-home"></i></a></li>
                <li><a href="#">管理员管理</a></li>
                <li class="active">管理员列表</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">管理员列表</div>
                </div>
                <div class="panel-body">
                    <div class="table-tools" style="margin-bottom: 15px;">
                        <div class="tools-group">
                            <a href="{{ route('users.create') }}" class="btn btn-primary"><i class="icon icon-plus-sign"></i> 新增</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th>名称</th>
                            <th>邮箱</th>
                            <th>角色</th>
                            <th>创建时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($roles = $user->roles)
                                        @foreach($roles as $role)
                                            <span class="label label-badge label-info label-outline">{{ $role->remarks }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-xs btn-primary"><i class="far fa-edit-alt"></i>编辑</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post"
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