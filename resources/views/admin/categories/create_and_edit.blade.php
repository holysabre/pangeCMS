@extends('admin.layouts.layout')

@section('title', $title = $category->id ? '编辑' : '新增')

@section('styles')
    <link href="/lib/webuploader/webuploader.css" rel="stylesheet">
    <script src="/lib/webuploader/webuploader.js"></script>
@stop


@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon icon-home"></i></a></li>
                <li><a href="#">分类管理</a></li>
                <li class="active">{{ $title }}</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-body">

                    <form id="form-validator" class="form-horizontal" method="POST" action="{{ $category->id ? route('categories.update',$category->id) : route('categories.store') }}">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method"  value="{{ $category->id ? 'PATCH' : 'POST' }}">

                        <div class="form-group">
                            <label for="type" class="col-md-2 col-sm-2 control-label required">所属分类</label>
                            <div class="col-md-5 col-sm-10">
                                <select name="parent_id" class="form-control">
                                    <option value="0">根栏目</option>
                                    @foreach($categories as $op)
                                        <option @if($op['id'] == old('parent_id', $category->parent_id)) selected @endif value="{{$op['id']}}">{{$op['name']}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {!! form_html('text', '名称', 'name', $category->name, true) !!}
                        {!! form_html('text', '关键词', 'keywords', $category->keywords) !!}
                        {!! form_html('textarea', '描述', 'description', $category->description) !!}
                        {!! form_html('select', '类型', 'type', $category->type, false, config('admin.category.type')) !!}
                        {!! form_html('text', '链接', 'link', $category->link) !!}
                        {!! form_html('text', '模版', 'template', $category->template) !!}
                        {!! form_html('text', '排序', 'order', $category->order) !!}
                        {!! form_html('radio', '状态', 'status', $category->status) !!}
                        {!! image_uploader('图片','thumb',$category->thumb,'categories') !!}

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
    <script src="/js/uploader.js"></script>
@stop