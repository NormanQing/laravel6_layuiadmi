@extends('backend.noadmincss')

@section('content')
    <style>
        .lever-2{
            display: flex;
        }
    </style>
    <div class="layui-btn-container">
        <button type="button" class="layui-btn layui-btn-sm" lay-on="distribution">分配权限</button>
        <button type="button" class="layui-btn layui-btn-sm" lay-on="clear">清空所有权限</button>
    </div>

    <div class="layui-form" lay-filter="layuiadmin-app-form-list" id="layuiadmin-app-form-list"
         style="padding: 20px 30px 0 0;">
        <ul>
        @foreach($permissions as $item)
            @include('backend.admin._permission_children', ['permission' => $item, 'parentId'=>$item['id']])
        @endforeach
        </ul>
    </div>
@endsection

@can('system.admin.permission')
    @section('script')
        <script>
            layui.use(['layer', 'tree', 'util', 'form'], function () {
                var $ = layui.$
                    , layer = layui.layer
                    , tree = layui.tree
                    , util = layui.util
                    , form = layui.form


                form.on('checkbox', function (data) {
                    var check = data.elem.checked;//是否选中
                    var checkId = data.elem.id;//当前操作的选项框
                    if (check) {
                        //选中
                        var ids = checkId.split("-");
                        if (ids.length == 3) {
                            //第三极菜单
                            //第三极菜单选中,则他的上级选中
                            console.log(ids[0] + '-' + ids[1])
                            console.log(ids[0])
                            $("#" + (ids[0] + '-' + ids[1])).prop("checked", true);
                            $("#" + (ids[0])).prop("checked", true);
                        } else if (ids.length == 2) {
                            //第二季菜单
                            $("#" + (ids[0])).prop("checked", true);
                            $("input[id*=" + ids[0] + '-' + ids[1] + "]").each(function (i, ele) {
                                $(ele).prop("checked", true);
                            });
                        } else {
                            //第一季菜单不需要做处理
                            $("input[id*=" + ids[0] + "-]").each(function (i, ele) {
                                $(ele).prop("checked", true);
                            });
                        }
                    } else {
                        //取消选中
                        var ids = checkId.split("-");
                        if (ids.length == 2) {
                            //第二极菜单
                            $("input[id*=" + ids[0] + '-' + ids[1] + "]").each(function (i, ele) {
                                $(ele).prop("checked", false);
                            });
                        } else if (ids.length == 1) {
                            $("input[id*=" + ids[0] + "-]").each(function (i, ele) {
                                $(ele).prop("checked", false);
                            });
                        }
                    }
                    form.render();
                });


                // 按钮事件
                util.event('lay-on', {
                    distribution: function (othis) {

                        var checkedData = [];
                        var val = $("input[name='permissions[]']:checked").each(function () {
                            checkedData.push($(this).val());
                        })

                        var loading = layer.load(3, {time: 30 * 1000});


                        if (checkedData.length <= 0) {
                            layer.close(loading);
                            layer.msg('请选择权限');
                            return false;
                        }
                        $.ajax({
                            url: '{{route("backend.admin.assignPermission", $admin->id)}}',
                            type: 'POST',
                            data: {permissions: checkedData},
                            dataType: 'json',
                            success: function (res) {
                                layer.close(loading);
                                layer.msg(res.msg);
                            },
                            error: function (err) {
                                layer.close(loading);
                                var res = JSON.parse(err.responseText)
                                var tmp = '';
                                console.log(res.errors)
                                var errors = res.errors;

                                for (let key in errors) {
                                    if (errors.hasOwnProperty(key)) {
                                        tmp += errors[key][0] + "<br />";
                                    }
                                }

                                layer.msg(tmp);
                                console.error('Error fetching colors:', err);
                            }
                        });
                    }
                    , clear: function (othis) {
                        var loading = layer.load(3, {time: 30 * 1000});

                        $.ajax({
                            url: '{{route("backend.admin.assignPermission", $admin->id)}}',
                            type: 'POST',
                            data: {permissions: []},
                            dataType: 'json',
                            success: function (res) {
                                layer.close(loading);
                                if (res.code == 0) {
                                    window.location.reload();
                                }
                                layer.msg(res.msg);
                            },
                            error: function (err) {
                                layer.close(loading);
                                var res = JSON.parse(err.responseText)
                                var tmp = '';
                                console.log(res.errors)
                                var errors = res.errors;

                                for (let key in errors) {
                                    if (errors.hasOwnProperty(key)) {
                                        tmp += errors[key][0] + "<br />";
                                    }
                                }

                                layer.msg(tmp);
                                console.error('Error fetching colors:', err);
                            }
                        });
                    }
                });
            })

        </script>
    @endsection
@endcan
