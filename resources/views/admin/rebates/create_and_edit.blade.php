@extends('admin.layouts.layout')

@section('title', $title = $rebate->id ? '编辑' : '新增')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('rebates.index') }}">角色管理</a></li>
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

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $rebate->id ? route('rebates.update', $rebate->id) : route('rebates.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $rebate->id ? 'PATCH' : 'POST' }}">

                        <div class="form-group">
                            <label for="member_group" class="col-md-2 col-sm-2 control-label">角色分组</label>
                            <div class="col-md-5 col-sm-10">
                                <input type="text" class="form-control" value="{{ $groups[$rebate->member_group] }}" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="number" class="col-md-2 col-sm-2 control-label">邀请人数</label>
                            <div class="col-md-5 col-sm-10 input-group">
                                <input type="text" class="form-control" name="number_from" value="{{ $rebate->number_from }}">
                                <span class="input-group-addon"> - </span>
                                <input type="text" class="form-control" name="number_to" value="{{ $rebate->number_to }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="proportion" class="col-md-2 col-sm-2 control-label">返佣比例</label>
                            <div class="col-md-5 col-sm-10 input-group">
                                <input type="text" class="form-control" name="proportion" value="{{ $rebate->proportion }}">
                                <span class="input-group-addon"> % </span>
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