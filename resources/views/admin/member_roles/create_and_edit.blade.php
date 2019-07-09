@extends('admin.layouts.layout')

@section('title', $title = $member_role->id ? '编辑' : '新增')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('member_roles.index') }}">会员角色管理</a></li>
                <li class="active">{{ $title }}</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-body">

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $member_role->id ? route('member_roles.update', $member_role->id) : route('member_roles.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $member_role->id ? 'PATCH' : 'POST' }}">

                        {!! form_html('text','名称','name',$member_role->name,true) !!}
                        {!! form_html('text','一次性考核积分','score',$member_role->score,true) !!}

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