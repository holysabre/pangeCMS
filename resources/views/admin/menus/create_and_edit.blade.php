@extends('admin.layouts.base')

@section('title', '新增|编辑菜单')

@section('content')
    <div class="layui-fluid">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md12">
                <div class="layui-card">
                    <div class="layui-card-header">设置我的资料</div>
                    <div class="layui-card-body" pad15>

                        @if($menu->id)
                        <form action="{{ route('menus.update', $menu->id) }}" method="POST" class="layui-form" lay-filter>
                            <input type="hidden" name="_method" value="PUT">
                        @else
                        <form action="{{ route('menus.store') }}" method="post" class="layui-form" lay-filter>
                        @endif
                            @csrf
                            <div class="layui-form-item">
                                <label class="layui-form-label">我的角色</label>
                                <div class="layui-input-inline">
                                    <select name="parent_id" lay-verify="">
                                        <option value="0">/顶级菜单</option>
                                        @foreach($menus as $op)
                                            <option value="{{ $op['id'] }}" {{ old('parent_id', $menu->parent_id) == $op['id']?'selected':'' }}>{!! $op['name_show'] !!}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="layui-form-mid layui-word-aux"></div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">名称</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="name" value="{{ old('name', $menu->name) }}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">路由</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="route" value="{{ old('route', $menu->route) }}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">权限</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="permission" value="{{ old('permission', $menu->permission) }}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">图标</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="icon" value="{{ old('icon', $menu->icon) }}" class="layui-input">
                                </div>
                                <div class="layui-form-mid layui-word-aux"><i class="layui-icon {{ $menu->icon }}"></i></div>
                            </div>
                            <div class="layui-form-item">
                                <label class="layui-form-label">排序</label>
                                <div class="layui-input-inline">
                                    <input type="text" name="order" value="{{ old('order', $menu->order) }}" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-form-item">
                                <div class="layui-input-block">
                                    <button class="layui-btn" lay-submit lay-filter="setmyinfo">提交</button>
                                    <button type="reset" class="layui-btn layui-btn-primary">重新填写</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        layui.use(['index', 'set', 'form'],function () {
            var layer = layui.layer;
            var form = layui.form;

        });
    </script>
@stop