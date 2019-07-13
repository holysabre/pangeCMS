@extends('admin.layouts.layout')

@section('title', $title = $user->id ? '编辑' : '新增')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('users.index') }}">管理员管理</a></li>
                <li class="active">{{ $title }}</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
                @include('admin.layouts._error')
            </div>
            <div class="panel">
                <div class="panel-body">

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $user->id ? route('users.update', $user->id) : route('users.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $user->id ? 'PATCH' : 'POST' }}">

                        {!! form_html('text','姓名','name',$user->name,true) !!}
                        {!! form_html('text','邮箱','email',$user->email,true) !!}

                        <div class="form-group">
                            <label for="password" class="col-md-2 col-sm-2 control-label">密码</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="password" name="password" class="form-control" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation" class="col-md-2 col-sm-2 control-label">重复密码</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="password" name="password_confirmation" class="form-control" value="" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role" class="col-md-2 col-sm-2 control-label">角色</label>
                            <div class="col-md-5 col-sm-10">
                                <div class="checkbox">
                                    @foreach($roles as $role)
                                        @php $checked = in_array($role->name,$user->getRoleNames()->toArray()) ? 'checked' : ''; @endphp
                                        <label class="checkbox-inline"><input type="checkbox" name="role[]" value="{{ $role->name }}" {{ $checked }}>{{ $role->remarks }}</label>
                                    @endforeach
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