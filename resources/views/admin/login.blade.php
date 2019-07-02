<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PangeCMS</title>
    <!-- zui css -->
    <link rel="stylesheet" href="/zui/dist/css/zui.min.css">
    <link rel="stylesheet" href="/zui/dist/theme/blue.css">
    <!-- app css -->
    <link rel="stylesheet" href="/zui/css/app.css">
    <!-- jquery js -->
    <script src="/zui/dist/lib/jquery/jquery.js"></script>

</head>
<body class="bg-primary">
<div class="page page-login text-center">
    <div class="panel">
        <div class="panel-body">
            <div class="logo">
                <a href="#">PangeCMS</a>
            </div>
            <form action="{{ route('admin.login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="邮箱" name="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="密码" name="password">
                </div>
                <div class="form-group">
                    <div class="col-sm-8">
                        <input type="text" class="form-control" placeholder="验证码" name="captcha">
                    </div>
                    <div class="col-sm-4">
                        <img src="{{captcha_src('flat')}}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击重新获取验证码">
                    </div>
                </div>
                <button type="submit" class="btn btn-lg btn-primary btn-block">登录</button>
            </form>
        </div>
    </div>
    @include('admin.layouts._error')
    <footer class="page-copyright page-copyright-inverse">
        <p>WEBSITE BY Pange</p>
        <p>© 2019. All RIGHT RESERVED.</p>
    </footer>
</div>


<!-- zui js -->
<script src="/zui/dist/js/zui.min.js"></script>
<!-- app js -->
<script src="/zui/js/app.js"></script>
</body>
</html>