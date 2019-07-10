@extends('admin.layouts.layout')

@section('title', $title = '会员详情')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="/admin"><i class="icon icon-home"></i></a></li>
                <li><a href="{{ route('members.index') }}">会员管理</a></li>
                <li class="active">{{ $title }}</li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
                @include('admin.layouts._message')
            </div>
            <div class="panel">
                <div class="panel-body">

                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td width="100">姓名</td>
                                <td width="200">{{ $member->name }}</td>
                                <td width="100">性别</td>
                                <td width="200">{{ config('member.sex')[$member->sex] }}</td>
                                <td>银行卡照片</td>
                                <td>二维码</td>
                                <td>身份证</td>
                            </tr>
                            <tr>
                                <td>ID</td>
                                <td>{{ $member->id }}</td>
                                <td>手机号</td>
                                <td>{{ $member->phone }}</td>
                                <td rowspan="6">
                                    <img src="" width="100"/>
                                    <br>
                                    <img src="" width="100"/>
                                </td>
                                <td rowspan="5">
                                    <img src="" width="100"/>
                                </td>
                                <td>{{ $member->card_number }}</td>
                            </tr>
                            <tr>
                                <td>注册时间</td>
                                <td>{{ $member->created_at }}</td>
                                <td>角色</td>
                                <td>{{ $member->member_role->name }}</td>
                                <td rowspan="5">
                                    {{--<img src="{{ $member->card_image_front }}" width="100"/>--}}
                                    {{--<br>--}}
                                    {{--<img src="{{ $member->card_image_back }}" width="100"/>--}}
                                </td>
                            </tr>
                            <tr>
                                <td>上级会员</td>
                                <td>@if($member->parent_id) {{ $member->parent->name }} @else <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_member_parent_id">编辑</button> @endif</td>
                                <td>上级ID</td>
                                <td>{{ $member->parent_id }}</td>
                            </tr><tr>
                                <td>收款方式</td>
                                <td>银行卡</td>
                                <td>所属银行</td>
                                <td>{{ isset($member->bank) ? $member->bank->name : '' }}</td>
                            </tr><tr>
                                <td>银行卡号</td>
                                <td>{{ isset($member->bank) ? $member->bank->number : '' }}</td>
                                <td>收货地址</td>
                                <td>{{ isset($member->address) ? $member->address->full_address : '' }}</td>
                            </tr>
                            <tr>
                                <td>邮编</td>
                                <td>{{ isset($member->address) ? $member->address->zipcode : '' }}</td>
                                <td>操作客服</td>
                                <td>{{ isset($member->user) ? $member->user->name : '' }}</td>
                                <td><a href="">下载</a></td>
                            </tr>
                        </tbody>
                    </table>

                    <table class="table table-bordered table-striped">
                        <tbody>
                        <tr>
                            <td>当前库存</td>
                            <td>拿货笔数</td>
                            <td>个人业绩</td>
                            <td>团队总业绩</td>
                            <td>晋升次数</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>下属总人数</td>
                            <td>下属执行董事（人）</td>
                            <td>下属大区经理（人）</td>
                            <td>下属区域经理（人）</td>
                            <td>下属业务经理（人）</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>


                    <ul class="nav nav-tabs">
                        <li class="active"><a data-tab href="#tabContent1">库存记录</a></li>
                        <li><a data-tab href="#tabContent2">个人业绩</a></li>
                        <li><a data-tab href="#tabContent3">下属人业绩</a></li>
                        <li><a data-tab href="#tabContent4">拿货记录</a></li>
                        <li><a data-tab href="#tabContent5">晋升记录</a></li>
                        <li><a data-tab href="#tabContent6">奖励记录</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabContent1">
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <td>时间</td>
                                    <td>方式</td>
                                    <td>库存</td>
                                    <td>申请人姓名</td>
                                    <td>声请人ID</td>
                                </tr>
                                <tr>
                                    <td>2019-7-10</td>
                                    <td>补货</td>
                                    <td>+30</td>
                                    <td>张三</td>
                                    <td>123</td>
                                </tr>
                                <tr>
                                    <td>2019-7-10</td>
                                    <td>补货</td>
                                    <td>+30</td>
                                    <td>张三</td>
                                    <td>123</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="tabContent2">
                            <p>标签2的内容。</p>
                        </div>
                        <div class="tab-pane" id="tabContent3">
                            <p>这是标签3的内容。</p>
                        </div>
                        <div class="tab-pane" id="tabContent4">
                            <p>这是标签4的内容。</p>
                        </div>
                        <div class="tab-pane" id="tabContent5">
                            <p>这是标签5的内容。</p>
                        </div>
                        <div class="tab-pane" id="tabContent6">
                            <p>这是标签6的内容。</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit_member_parent_id">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form action="{{ route('members.setParent',$member->id) }}" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">关闭</span></button>
                    <h4 class="modal-title">编辑上级会员</h4>
                </div>
                <div class="modal-body">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method"  value="PUT">
                    会员ID：<input type="text" name="parent_id" value="" class="form-check-input" id="edit_parent_id">
                    <br><br>
                    会员名称：<span id="edit_parent_name"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $('#edit_parent_id').keyup(function () {
                var parent_id = $(this).val();
                $.get("{{ route('members.getName') }}",{
                    _token:"{{ csrf_token() }}",
                    parent_id:parent_id
                },function (result) {
                    if(result.status === 1){
                        $('#edit_parent_name').text(result.data.name);
                    }else{
                        new $.zui.Messager(result.msg, {
                            icon: 'exclamation-sign',
                            type: 'danger',
                            placement: 'center'
                        }).show();
                    }
                },"JSON");
            });
        })
    </script>
@stop