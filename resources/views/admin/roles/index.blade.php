@extends('admin.layouts.layout')

@section('title', '角色列表')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon icon-home"></i></a></li>
                <li><a href="#">角色管理</a></li>
                <li class="active">角色列表</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">角色列表</div>
                </div>
                <div class="panel-body">
                    <div class="table-tools" style="margin-bottom: 15px;">
                        <div class="tools-group">
                            <a href="{{ route('roles.create') }}" class="btn btn-primary"><i class="icon icon-plus-sign"></i> 新增</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th width="50">ID</th>
                            <th>角色名称</th>
                            <th>角色备注</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>{{ $role->id }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->remarks }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-xs btn-primary"><i class="far fa-edit-alt"></i>编辑</a>
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