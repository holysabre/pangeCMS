<header class="main-header">
    <nav class="navbar navbar-fixed-top bg-primary">
        <div class="navbar-header">
            <a class="navbar-toggle" href="javascript:;" data-toggle="collapse" data-target=".navbar-collapse"><i class="icon icon-th-large"></i></a>
            <a class="sidebar-toggle" href="javascript:;" data-toggle="push-menu"><i class="icon icon-bars"></i></a>
            <a class="navbar-brand" href="#">
                <span class="logo">PangeAdmin</span>
                <span class="logo-mini">Pange</span>
            </a>
        </div>
        <div class="collapse navbar-collapse">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="javascript:;" data-toggle="push-menu"><i class="icon icon-bars"></i></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="javascript:;">
                                    <span>
                                        <i class="icon icon-bell-alt"></i>
                                        <span class="label label-danger label-pill up">5</span>
                                    </span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                                    <span>
                                        <i class="icon icon-envelope-alt"></i>
                                        <span class="label label-success label-pill up">2</span>
                                    </span>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="javascript:;" data-toggle="dropdown"><i class="icon icon-user"></i> 管理员 <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('users.edit', Auth::id()) }}">资料设置</a></li>
                            <li><a href="#">清除缓存</a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('admin.logout') }}">注销</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>