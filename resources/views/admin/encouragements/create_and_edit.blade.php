@extends('admin.layouts.layout')

@section('title', $title = $encouragement->id ? '编辑' : '新增')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('encouragements.index') }}">角色管理</a></li>
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

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $encouragement->id ? route('encouragements.update', $encouragement->id) : route('encouragements.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $encouragement->id ? 'PATCH' : 'POST' }}">

                        <div class="form-group">
                            <label for="member_group" class="col-md-2 col-sm-2 control-label">角色</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" class="form-control" value="{{ $encouragement->member_role->name }}" disabled>
                            </div>
                        </div>

                        {!! form_html('text','奖励金额','reward',$encouragement->reward) !!}

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