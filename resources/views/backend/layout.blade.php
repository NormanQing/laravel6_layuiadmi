
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>管理后台</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/res/layui/css/layui.css" rel="stylesheet">
        <link href="/res/layui/adminui/css/admin.css" rel="stylesheet">
        <link href="/fontawesome-free-6.5.2-web/css/all.css" rel="stylesheet">

        <style>
            .layui-side-menu .layui-nav>.layui-nav-item .ufa:first-child {
                position: absolute;
                top: 73%;
                left: 20px;
                margin-top: -19px;
            }
        </style>
    </head>
    <body class="layui-layout-body" id="LAY_home_iframe">
        <div id="LAY_app" style="visibility: hidden">
            <div class="layui-layout layui-layout-admin">
                <div class="layui-header">
                    <!-- 头部区域 -->
                    <ul class="layui-nav layui-layout-left">
                        <li class="layui-nav-item layadmin-flexible" lay-unselect>
                            <a href="javascript:;" layadmin-event="flexible" title="侧边伸缩">
                                <i class="layui-icon layui-icon-shrink-right" id="LAY_app_flexible"></i>
                            </a>
                        </li>
                        <li class="layui-nav-item layui-hide-xs" lay-unselect>
                            <a href="http://www.baidu.com/" target="_blank" title="前台">
                                <i class="layui-icon layui-icon-website"></i>
                            </a>
                        </li>
                        <li class="layui-nav-item" lay-unselect>
                            <a href="javascript:;" layadmin-event="refresh" title="刷新">
                                <i class="layui-icon layui-icon-refresh-3"></i>
                            </a>
                        </li>
                        <li class="layui-nav-item layui-hide-xs" lay-unselect>
                            <input type="text" placeholder="搜索..." autocomplete="off" class="layui-input layui-input-search" layadmin-event="serach" lay-action="template/search.html?keywords=">
                        </li>
                    </ul>
                    <ul class="layui-nav layui-layout-right" lay-filter="layadmin-layout-right">

                        <li class="layui-nav-item" lay-unselect>
                            <a lay-href="app/message/index.html" layadmin-event="message" lay-text="消息中心">
                                <i class="layui-icon layui-icon-notice"></i>

                                <!-- 如果有新消息，则显示小圆点 -->
                                <span class="layui-badge-dot"></span>
                            </a>
                        </li>
                        <li class="layui-nav-item layui-hide-xs" lay-unselect>
                            <a href="javascript:;" layadmin-event="note">
                                <i class="layui-icon layui-icon-note"></i>
                            </a>
                        </li>
                        <li class="layui-nav-item layui-hide-xs" lay-unselect>
                            <a href="javascript:;" layadmin-event="theme">
                                <i class="layui-icon layui-icon-theme"></i>
                            </a>
                        </li>
                        <li class="layui-nav-item layui-hide-xs" lay-unselect>
                            <a href="javascript:;" layadmin-event="fullscreen">
                                <i class="layui-icon layui-icon-screen-full"></i>
                            </a>
                        </li>
                        <li class="layui-nav-item" lay-unselect>
                            <a href="javascript:;">
                                <cite>{{$admin->username}}</cite>
                            </a>
                            <dl class="layui-nav-child">
                                <dd><a lay-href="set/user/info.html">基本资料</a></dd>
                                <dd><a lay-href="set/user/password.html">修改密码</a></dd>
                                <hr>
                                <dd style="text-align: center;"><a href="{{route('backend.logout')}}">退出</a></dd>
                            </dl>
                        </li>

                        <li class="layui-nav-item layui-hide-xs" lay-unselect>
                            <a href="javascript:;" layadmin-event="about"><i class="layui-icon layui-icon-more-vertical"></i></a>
                        </li>
                        <li class="layui-nav-item layui-show-xs-inline-block layui-hide-sm" lay-unselect>
                            <a href="javascript:;" layadmin-event="more"><i class="layui-icon layui-icon-more-vertical"></i></a>
                        </li>
                    </ul>
                </div>

                <!-- 侧边菜单 -->
                <div class="layui-side layui-side-menu">
                    <div class="layui-side-scroll">
                        <div class="layui-logo" lay-href="home/console.html">
                            <span>layuiAdmin</span>
                        </div>

                        <ul class="layui-nav layui-nav-tree" lay-accordion id="LAY-system-side-menu" lay-filter="layadmin-system-side-menu">
                            <li data-name="home" class="layui-nav-item layui-nav-itemed">
                                <a href="javascript:;" lay-tips="主页" lay-direction="2">
                                    <i class="layui-icon layui-icon-home"></i>
                                    <cite>主页</cite>
                                </a>
                                <dl class="layui-nav-child">
                                    <dd data-name="console" class="layui-this">
                                        <a lay-href="{{route('backend.index')}}">控制台</a>
                                    </dd>
                                    <dd data-name="console">
                                        <a lay-href="{{route('backend.index1')}}">主页一</a>
                                    </dd>
                                    <dd data-name="console">
                                        <a lay-href="{{route('backend.index2')}}">主页二</a>
                                    </dd>
                                </dl>
                            </li>
                            @foreach($menus as $menu)
                                @can($menu->name)
                                    @if($menu->children->isEmpty())
                                        <li class="layui-nav-item">
                                            <a href="{{route($menu->route)}}" lay-tips="{{$menu->display_name}}" lay-direction="2">
                                                <i class="{{$menu->icon_class}}"></i>
                                                <cite>{{$menu->display_name}}</cite>
                                            </a>
                                        </li>
                                    @else
                                        <li data-name="component" class="layui-nav-item">
                                            <a href="javascript:;" lay-tips="{{$menu->display_name}}" lay-direction="2">
                                                <i class="{{$menu->icon_class}}"></i>
                                                <cite>{{$menu->display_name}}</cite>
                                            </a>
                                            <dl class="layui-nav-child">
{{--                                                <dd data-name="grid">--}}
{{--                                                    <a href="javascript:;">栅格</a>--}}
{{--                                                    <dl class="layui-nav-child">--}}
{{--                                                        <dd data-name="list"><a lay-href="component/grid/list.html">等比例列表排列</a></dd>--}}
{{--                                                        <dd data-name="mobile"><a lay-href="component/grid/mobile.html">按移动端排列</a></dd>--}}
{{--                                                        <dd data-name="mobile-pc"><a lay-href="component/grid/mobile-pc.html">移动桌面端组合</a></dd>--}}
{{--                                                        <dd data-name="all"><a lay-href="component/grid/all.html">全端复杂组合</a></dd>--}}
{{--                                                        <dd data-name="stack"><a lay-href="component/grid/stack.html">低于桌面堆叠排列</a></dd>--}}
{{--                                                        <dd data-name="speed-dial"><a lay-href="component/grid/speed-dial.html">九宫格</a></dd>--}}
{{--                                                    </dl>--}}
{{--                                                </dd>--}}
                                                @foreach($menu->children as $child)
                                                    @can($child->name)
                                                        <dd data-name="button">
                                                            <a lay-href="{{route($child->route)}}">{{$child->display_name}}</a>
                                                        </dd>
                                                    @endcan
                                                @endforeach
                                            </dl>
                                        </li>
                                    @endif
                                @endcan
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- 页面标签 -->
                <div class="layadmin-pagetabs" id="LAY_app_tabs">
                    <div class="layui-icon layadmin-tabs-control layui-icon-prev" layadmin-event="leftPage"></div>
                    <div class="layui-icon layadmin-tabs-control layui-icon-next" layadmin-event="rightPage"></div>
                    <div class="layui-icon layadmin-tabs-control layui-icon-down">
                        <ul class="layui-nav layadmin-tabs-select" lay-filter="layadmin-pagetabs-nav">
                            <li class="layui-nav-item" lay-unselect>
                                <a href="javascript:;"></a>
                                <dl class="layui-nav-child layui-anim-fadein">
                                    <dd layadmin-event="closeThisTabs"><a href="javascript:;">关闭当前标签页</a></dd>
                                    <dd layadmin-event="closeOtherTabs"><a href="javascript:;">关闭其它标签页</a></dd>
                                    <dd layadmin-event="closeRightTabs"><a href="javascript:;">关闭右侧标签页</a></dd>
                                    <dd layadmin-event="closeAllTabs"><a href="javascript:;">关闭全部标签页</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </div>
                    <div class="layui-tab" lay-unauto lay-allowClose="true" lay-filter="layadmin-layout-tabs">
                        <ul class="layui-tab-title" id="LAY_app_tabsheader">
                            <li lay-id="home/console.html" lay-attr="home/console.html" class="layui-this"><i class="layui-icon layui-icon-home"></i></li>
                        </ul>
                    </div>
                </div>


                <!-- 主体内容 -->
                <div class="layui-body" id="LAY_app_body">
                    <div class="layadmin-tabsbody-item layui-show">
                        <iframe src="{{route('backend.index')}}" frameborder="0" class="layadmin-iframe"></iframe>
                    </div>
                </div>

                <!-- 辅助元素，一般用于移动设备下遮罩 -->
                <div class="layadmin-body-shade" layadmin-event="shade"></div>
            </div>
        </div>

        <script src="/res/layui/layui.js"></script>
        <script>
            layui.config({
                base: '/res/layui/' // 静态资源所在路径
            }).use(['index']);
        </script>
    </body>
</html>
