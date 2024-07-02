
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>layuiAdmin</title>
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/res/layui/css/layui.css" rel="stylesheet">
    <link href="/res/layui/adminui/css/admin.css" rel="stylesheet">
    <link href="/fontawesome-free-6.5.2-web/css/all.css" rel="stylesheet">
    <style>
        .layui-btn .fa {
            padding: 0 2px;
            vertical-align: middle\0;
        }
    </style>
</head>
<body>
<div class="layui-fluid">
    @yield('content')
</div>

<script src="/res/layui/layui.js"></script>
<script>
    layui.config({
        base: '/res/layui/' // 静态资源所在路径
    }).use(['index','console','sample'], function(){
        var $ = layui.$;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
@yield('script')
</body>
</html>

