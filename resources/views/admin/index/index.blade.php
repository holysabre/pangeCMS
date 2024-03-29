@extends('admin.layouts.layout')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <ul class="breadcrumb">
                <li><a href="#"><i class="icon icon-home"></i></a></li>
                <li><a href="#">后台管理</a></li>
                <li class="active"></li>
            </ul>
        </div>
        <div class="content-body">
            <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-info">
                    <div class="info-box-icon">
                        <i class="icon icon-file-text"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">文章总量</span>
                        <span class="info-box-number">320
                                        <small>篇</small>
                                    </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-primary">
                    <div class="info-box-icon">
                        <i class="icon icon-user"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">用户总量</span>
                        <span class="info-box-number">90
                                        <small>个</small>
                                    </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-warning">
                    <div class="info-box-icon">
                        <i class="icon icon-bars"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">栏目总量</span>
                        <span class="info-box-number">8
                                        <small>个</small>
                                    </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box bg-danger">
                    <div class="info-box-icon">
                        <i class="icon icon-eye-open"></i>
                    </div>
                    <div class="info-box-content">
                        <span class="info-box-text">PV总量</span>
                        <span class="info-box-number">18953
                                        <small>次</small>
                                    </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">产品信息</div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-info">
                            <tr>
                                <td>产品名称</td>
                                <td>zui-admin</td>
                            </tr>
                            <tr>
                                <td>核心框架</td>
                                <td>zui v1.7.0</td>
                            </tr>
                            <tr>
                                <td>开发作者</td>
                                <td>mofee（莫非）</td>
                            </tr>
                            <tr>
                                <td>联系方式</td>
                                <td>QQ：205155513</td>
                            </tr>
                            <tr>
                                <td>交流讨论</td>
                                <td><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=65deab2f8ea1e9d2445c3262d133da48fe9de53bd90a3146c3f7bb6fb9d63ead"><img border="0" src="http://pub.idqqimg.com/wpa/images/group.png" alt="zui-admin后台模板交流" title="zui-admin后台模板交流"></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">服务器信息</div>
                    </div>
                    <div class="panel-body">
                        <table class="table table-info">
                            <tr>
                                <td>操作系统</td>
                                <td>Windows</td>
                            </tr>
                            <tr>
                                <td>运行环境</td>
                                <td>nginx/1.4.6</td>
                            </tr>
                            <tr>
                                <td>PHP版本</td>
                                <td>5.5.9-1ubuntu4.21</td>
                            </tr>
                            <tr>
                                <td>MYSQL版本</td>
                                <td>10.1.11-MariaDB-log</td>
                            </tr>
                            <tr>
                                <td>上传限制</td>
                                <td>20M</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
    </div>
@stop