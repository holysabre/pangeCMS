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
                    <th width="30">
                        <input type="checkbox">
                    </th>
                    <th width="50">ID</th>
                    <th>用户名</th>
                    <th>昵称</th>
                    <th>手机号</th>
                    <th>邮箱</th>
                    <th>创建时间</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>1</td>
                    <td>mofer</td>
                    <td>莫非</td>
                    <td>151xxxx1234</td>
                    <td>205155513@qq.com</td>
                    <td>2017-11-10 10:20</td>
                    <td>
                        <a href="#" class="btn btn-xs btn-primary">编辑</a>
                        <a href="#" class="btn btn-xs btn-danger">删除</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('scripts')
@stop