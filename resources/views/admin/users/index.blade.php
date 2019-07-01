@extends('admin.layouts.layout')

@section('title', '菜单列表')

@section('content')
    <div class="panel">
        <div class="panel-heading">
            <div class="panel-title">用户列表</div>
        </div>
        <div class="panel-body">
            <div class="table-tools" style="margin-bottom: 15px;">
                <div class="pull-right" style="width: 250px;">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="关键字">
                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">搜索</button>
                                        </span>
                    </div>
                </div>
                <div class="tools-group">
                    <a href="#" class="btn btn-primary"><i class="icon icon-plus-sign"></i> 新增</a>
                    <a href="#" class="btn btn-success"><i class="icon icon-check-circle"></i> 启用</a>
                    <a href="#" class="btn btn-warning"><i class="icon icon-ban-circle"></i> 禁用</a>
                    <a href="#" class="btn btn-danger"><i class="icon icon-remove-sign"></i> 删除</a>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th width="50">ID</th>
                    <th>名称</th>
                    <th>路由</th>
                    <th>权限</th>
                    <th>排序</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($menus as $menu)
                        <tr>
                            <td>{{ $menu->id }}</td>
                            <td>{{ $menu->name_show }}</td>
                            <td>{{ $menu->route }}</td>
                            <td>{{ $menu->permission }}</td>
                            <td>{{ $menu->order }}</td>
                            <td>{{ $menu->created_at }}</td>
                            <td>
                                <a href="{{ route('menus.edit', $menu->id) }}" class="btn btn-xs btn-primary"><i class="far fa-edit-alt"></i>编辑</a>
                                <form action="{{ route('menus.destroy', $menu->id) }}" method="post"
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
@stop

@section('scripts')
@stop