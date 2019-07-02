@extends('admin.layouts.layout')

@section('title', $title = $menu->id ? '编辑' : '新增')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon icon-home"></i></a></li>
                <li><a href="#">菜单管理</a></li>
                <li class="active">{{ $title }}</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-body">

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $menu->id ? route('menus.update', $menu->id) : route('menus.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $menu->id ? 'PATCH' : 'POST' }}">

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="type" class="col-md-2 col-sm-2 control-label required">所属分类</label>
                            <div class="col-md-5 col-sm-10">
                                <select name="parent_id" class="form-control">
                                    <option value="0">根栏目</option>
                                    @foreach($menus as $op)
                                        <option @if($op['id'] == old('parent_id', $menu->parent_id)) selected @endif value="{{$op['id']}}">{{$op['name_show']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="title" class="col-md-2 col-sm-2 control-label required">名称</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" name="name" required autocomplete="off" class="form-control" value="{{ old('name',$menu->name) }}" >
                            </div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="title" class="col-md-2 col-sm-2 control-label">路由</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" name="route" autocomplete="off" class="form-control" value="{{ old('route',$menu->route) }}" >
                            </div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="title" class="col-md-2 col-sm-2 control-label">权限</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" name="permission" autocomplete="off" class="form-control" value="{{ old('permission',$menu->permission) }}" >
                            </div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="title" class="col-md-2 col-sm-2 control-label">排序</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" name="order" autocomplete="off" class="form-control" value="{{ old('order',$menu->order) }}" >
                            </div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="title" class="col-md-2 col-sm-2 control-label">图标</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" name="icon" autocomplete="off" class="form-control" value="{{ old('icon',$menu->icon) }}" >
                            </div>
                        </div>

                        <div class="form-group has-feedback  has-icon-right">
                            <label for="title" class="col-md-2 col-sm-2 control-label">链接</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" name="link" autocomplete="off" class="form-control" value="{{ old('link',$menu->link) }}" >
                            </div>
                        </div>

                        <div class="form-group has-feedback has-icon-right">
                            <label for="" class="col-md-2 col-sm-2 control-label required">状态</label>
                            <div class="col-md-5 col-sm-10">
                                <div class="radio">
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="0" @if($menu->status == 0) checked="" @endif required > 隐藏
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="status" value="1" @if($menu->status == 1) checked="" @endif required > 显示
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-5 col-sm-10">
                                <button type="submit" class="btn btn-primary">提交</button>
                                <button type="reset" class="btn btn-default">重置</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')

@stop