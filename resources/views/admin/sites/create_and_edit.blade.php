@extends('admin.layouts.layout')

@section('title', $title = '站点信息')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon icon-home"></i></a></li>
                <li><a href="#">站点管理</a></li>
                <li class="active">{{ $title }}</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-body">

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ route('sites.save') }}">
                        {{ csrf_field() }}

                        <ul class="nav nav-tabs">
                            @foreach($config_section as $section => $section_name)
                                <li class="{{ $section == 'basic' ? 'active' : '' }}"><a data-tab href="#{{ $section }}">{{ $section_name }}</a></li>
                            @endforeach
                        </ul>
                        <div class="tab-content">
                            @foreach($sites as $section => $items)
                                <div class="tab-pane {{ $section == 'basic' ? 'active' : '' }}" id="{{ $section }}" style="margin-top: 10px;">
                                    @foreach($items as $site)
                                        @switch($site['type'])
                                            @case('text')
                                                <div class="form-group">
                                                    <label for="{{ $site->key }}" class="col-md-2 col-sm-2 control-label">{{ $site->name }}</label>
                                                    <div class="col-md-5 col-sm-10">
                                                        <input type="text" name="{{ $site->id }}" autocomplete="off" class="form-control" value="{{ $site->value }}" >
                                                    </div>
                                                </div>
                                                @break
                                            @case('textarea')
                                                <div class="form-group">
                                                    <label for="{{ $site->key }}" class="col-md-2 col-sm-2 control-label">{{ $site->name }}</label>
                                                    <div class="col-md-5 col-sm-10">
                                                        <textarea name="{{ $site->id }}" class="form-control">{{ $site->value }}</textarea>
                                                    </div>
                                                </div>
                                                @break
                                            @case('radio')
                                                <div class="form-group">
                                                    <label for="{{ $site->key }}" class="col-md-2 col-sm-2 control-label">{{ $site->name }}</label>
                                                    <div class="col-md-5 col-sm-10">
                                                        <div class="radio-inline">
                                                            <label>
                                                                <input type="radio" name="{{ $site->id }}" value="0" {{ $site->value == 0 ? 'checked' : '' }}> 关闭
                                                            </label>
                                                        </div>
                                                        <div class="radio-inline">
                                                            <label>
                                                                <input type="radio" name="{{ $site->id }}" value="1" {{ $site->value == 1 ? 'checked' : '' }}> 开启
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                @break
                                            @default
                                                @break
                                        @endswitch
                                    @endforeach
                                </div>
                            @endforeach
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