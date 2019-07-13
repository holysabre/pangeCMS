@extends('admin.layouts.layout')

@section('title', $title = $permission->id ? '编辑' : '新增')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('permissions.index') }}">权限管理</a></li>
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

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $permission->id ? route('permissions.update', $permission->id) : route('permissions.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $permission->id ? 'PATCH' : 'POST' }}">

                        {!! form_html('text','名称','name',$permission->name,true) !!}
                        {!! form_html('text','备注','remarks',$permission->remarks) !!}

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