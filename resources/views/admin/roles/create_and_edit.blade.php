@extends('admin.layouts.layout')

@section('title', $title = $role->id ? '编辑' : '新增')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('roles.index') }}">角色管理</a></li>
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

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $role->id ? route('roles.update', $role->id) : route('roles.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $role->id ? 'PATCH' : 'POST' }}">

                        {!! form_html('text','名称','name',$role->name,true) !!}
                        {!! form_html('text','备注','remarks',$role->remarks) !!}

                        <div class="form-group">
                            <label for="role" class="col-md-2 col-sm-2 control-label">角色</label>
                            <div class="col-md-5 col-sm-10">
                                <div class="checkbox">
                                    @php $role_permissions = array_column($role->permissions->toArray(),'name'); @endphp
                                    @foreach($permissions as $permission)
                                        @php $checked = in_array($permission->name,$role_permissions) ? 'checked' : ''; @endphp
                                        <label class="checkbox-inline"><input type="checkbox" name="permission[]" value="{{ $permission->name }}" {{ $checked }}>{{ $permission->remarks }}</label>
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