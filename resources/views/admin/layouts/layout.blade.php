<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'PangeCMS')</title>
    <!-- zui css -->
    <link rel="stylesheet" href="/zui/dist/css/zui.min.css">
    <link rel="stylesheet" href="/zui/dist/theme/blue.css">
    <!-- app css -->
    <link rel="stylesheet" href="/zui/css/app.css">
    <link rel="stylesheet" href="/css/admin.css">

    <!-- jquery js -->
    <script src="/js/jquery.min.js"></script>
    <script>
        var BASE_URL = '/lib/webuploder/';
    </script>

    @yield('styles')
</head>
<body>

<div class="wrapper">

    @include('admin.layouts._header')

    @include('admin.layouts._sidebar')

    @yield('content')
</div>

<!-- zui js -->
<script src="/zui/dist/js/zui.min.js"></script>
<!-- app js -->
<script src="/zui/js/app.js"></script>

@yield('scripts')

</body>
</html>