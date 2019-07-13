@extends('admin.layouts.layout')

@section('title', '首单鼓励制度列表')

@section('content')

    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('rebates.index') }}">首单鼓励制度管理</a></li>
                <li class="active">首单鼓励制度列表</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
                @include('admin.layouts._error')
            </div>
            <div class="panel">
                <div class="panel-heading">
                    <div class="panel-title">首单鼓励制度列表</div>
                </div>
                <div class="panel-body">
                    <div class="table-tools" style="margin-bottom: 15px;"></div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>被邀请人角色</th>
                            <th>奖励金额</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($encouragements as $encouragement)
                                <tr>
                                    <td>{{ $encouragement->member_role->name }}</td>
                                    <td>{{ $encouragement->reward }}</td>
                                    <td>
                                        <a href="{{ route('encouragements.edit', $encouragement->id) }}" class="btn btn-xs btn-primary"><i class="far fa-edit-alt"></i>编辑</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
@stop