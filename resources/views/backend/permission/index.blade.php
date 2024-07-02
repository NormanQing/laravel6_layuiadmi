@extends('backend.base')

@section('content')
    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">名称</label>
                        <div class="layui-input-inline">
                            <input type="text" name="name" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn layuiadmin-btn-list" lay-submit=""
                                lay-filter="LAY-app-contlist-search">
                            <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="layui-card-body">
                <div style="padding-bottom: 10px;">
                    @can('system.permission.destroy')
                        <button class="layui-btn layuiadmin-btn-list" data-type="batchdel">
                            <i class="fa fa-trash"></i>删除
                        </button>
                    @endcan
                    @can('system.permission.create')
                        <button class="layui-btn layuiadmin-btn-list" data-type="add">
                            <i class="fa fa-notes-medical"></i>添加
                        </button>
                    @endcan
                </div>
                <table id="table-list" lay-filter="table-list"></table>
                <script type="text/html" id="barDemo">
                    <div class="layui-btn-container">
                        @can('system.permission.edit')
                            <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">
                                <i class="fa fa-pen-to-square"></i>编辑</a>
                        @endcan
                        @can('system.permission.create')
                            <a class="layui-btn layui-btn-warm layui-btn-xs" lay-event="addChild">
                                <i class="fa fa-notes-medical"></i>新增
                            </a>
                        @endcan
                        @can('system.permission.destroy')
                            <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">
                                <i class="fa fa-trash"></i>删除
                            </a>
                        @endcan
                    </div>
                </script>
            </div>
        </div>
    </div>
@endsection

@can('system.permission')
    @section('script')
        <script>
            layui.use(['treeTable', 'form'], function () {
                var treeTable = layui.treeTable;
                var form = layui.form;
                var $ = layui.$;

                //事件-搜索
                form.on('submit(LAY-app-contlist-search)', function (data) {
                    var field = data.field;

                    //执行重载
                    table.reload('table-list', {
                        where: field
                    });
                });

                var inst = treeTable.render({
                    elem: "#table-list"
                    , url: "{{route('backend.permission.list')}}" //
                    , defaultToolbar: ['filter', 'exports', 'print', {
                        title: '帮助'
                        , layEvent: 'LAYTABLE_TIPS'
                        , icon: 'layui-icon-tips'
                    }]
                    , height: 'full-200' // 最大高度减去其他容器已占有的高度差
                    , page: true
                    , tree: {
                        async: {
                            enable: true,
                            url: "{{route('backend.permission.children')}}", // 此处为静态模拟数据，实际使用时需换成真实接口
                            autoParam: ["parent_id=id"]
                        },
                        customName: {
                            name: 'display_name'
                        },
                        data: {},
                        view: {},
                        callback: {}
                    }
                    , cols: [[
                        {type: 'checkbox', fixed: 'left'}
                        , {
                            field: 'id',
                            fixed: 'left',
                            title: 'ID',
                            width: 170,
                            sort: true,
                            totalRowText: '合计：',
                            fixed: 'left'
                        }
                        , {field: 'display_name', title: '菜单', fixed: 'left'}
                        , {field: 'icon_class', title: '图标', align: 'center', templet: function(d){
                                if(d.icon_type == 2){
                                    return '<i class="'+d.icon_class+'"><i/>';
                                }else{
                                    return '<i class="layui-icon '+d.icon_class+'"><i/>';
                                }
                            }}
                        , {field: 'name', title: '权限'}
                        , {field: 'route', title: '路由'}
                        , {field: 'guard_name', title: 'guard_name'}
                        , {fixed: 'right', title: '操作', width: 200, minWidth: 125, toolbar: '#barDemo'}
                    ]]
                });
                // 事件-工具条
                treeTable.on('tool(' + inst.config.id + ')', function (obj) {
                    var id = obj.config.id;
                    var data = obj.data;
                    var othis = lay(data);
                    console.log(data)
                    switch (obj.event) {

                        case 'addChild':
                            layer.open({
                                type: 2
                                , title: '添加子级'
                                , content: '{{route("backend.permission.create")}}' + '?parent_id=' + data.id
                                , maxmin: true
                                , area: ['800px', '800px']
                                , btnAlign: 'c'
                                , btn: ['确定', '取消']
                                , yes: function (index, layero) {
                                    //点击确认触发 iframe 内容中的按钮提交
                                    var submit = layero.find('iframe').contents().find("#layuiadmin-app-form-submit");
                                    submit.click();
                                }
                            });
                            break;
                        case 'edit':
                            layer.open({
                                type: 2
                                , title: '编辑'
                                , content: '{{route("backend.permission.edit", "id")}}'.replace("id", data.id)
                                , maxmin: true
                                , area: ['800px', '800px']
                                , btnAlign: 'c'
                                , btn: ['确定', '取消']
                                , yes: function (index, layero) {
                                    //点击确认触发 iframe 内容中的按钮提交
                                    var submit = layero.find('iframe').contents().find("#layuiadmin-app-form-submit");
                                    submit.click();
                                }
                            });
                            break;

                        case 'del':
                            var ids = [data.id]
                            layer.confirm('确定删除吗？', function (index) {
                                $.ajax({
                                    url: '{{route("backend.permission.destroy")}}', // 获取颜色数据的接口
                                    type: 'POST',
                                    data: {ids: ids},
                                    dataType: 'json',
                                    success: function (res) {
                                        layer.close(index);
                                        if (res.code == 0) {
                                            treeTable.reload('table-list');
                                            layer.msg('已删除');
                                        } else {
                                            layer.msg(res.msg);
                                        }
                                    },
                                    error: function (err) {
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

                            });

                            break;
                    }
                    ;
                });

                var active = {
                    batchdel: function () {
                        var checkStatus = treeTable.checkStatus('table-list')
                            , checkData = checkStatus.data; //得到选中的数据

                        if (checkData.length === 0) {
                            return layer.msg('请选择数据');
                        }

                        var ids = [];

                        checkData.forEach(function (item) {
                            ids.push(item.id)
                        })

                        // console.log(checkData)
                        layer.confirm('确定删除吗？', function (index) {
                            $.ajax({
                                url: '{{route("backend.permission.destroy")}}', // 获取颜色数据的接口
                                type: 'POST',
                                data: {ids: ids},
                                dataType: 'json',
                                success: function (res) {
                                    layer.close(index);
                                    if (res.code == 0) {
                                        treeTable.reload('table-list');
                                        layer.msg('已删除');
                                    } else {
                                        layer.msg(res.msg);
                                    }
                                },
                                error: function (err) {
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

                        });
                    },
                    add: function () {
                        layer.open({
                            type: 2
                            , title: '添加'
                            , content: '{{route('backend.permission.create')}}'
                            , maxmin: true
                            , area: ['800px', '800px']
                            , btnAlign: 'c'
                            , btn: ['确定', '取消']
                            , yes: function (index, layero) {
                                //点击确认触发 iframe 内容中的按钮提交
                                var submit = layero.find('iframe').contents().find("#layuiadmin-app-form-submit");
                                submit.click();
                            }
                        });
                    }
                };

                $('.layui-btn.layuiadmin-btn-list').on('click', function () {
                    var type = $(this).data('type');
                    active[type] ? active[type].call(this) : '';
                });

                // 单元格编辑事件
                treeTable.on('edit(table-list)', function (obj) {
                    var field = obj.field //得到字段
                        , value = obj.value //得到修改后的值
                        , data = obj.data; //得到所在行所有键值

                    var update = {};
                    update[field] = value;
                    obj.update(update);
                });
            });
        </script>
    @endsection
@endcan
