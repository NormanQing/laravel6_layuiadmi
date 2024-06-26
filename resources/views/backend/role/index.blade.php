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
                    @can('system.role.destroy')
                        <button class="layui-btn layuiadmin-btn-list" data-type="batchdel"><i class="fa fa-trash"></i>删除</button>
                    @endcan
                    @can('system.role.create')
                        <button class="layui-btn layuiadmin-btn-list" data-type="add"><i class="fa fa-notes-medical"></i>添加</button>
                    @endcan
                </div>
                <table id="table-list" lay-filter="table-list"></table>
                <script type="text/html" id="barDemo">
                    @can('system.role.edit')
                        <a class="layui-btn layui-btn-normal layui-btn-xs" lay-event="edit">
                            <i class="fa fa-pen-to-square"></i>编辑
                        </a>
                    @endcan
                    @can('system.role.destroy')
                        @{{#if (d.id !=1){  }}
                        <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">
                            <i class="fa fa-trash"></i>删除
                        </a>
                        @{{# } }}
                    @endcan
                    @can('system.role.permission')
                        <button class="layui-btn layui-btn-xs layui-bg-purple" lay-event="permission">
                            <i class="fa fa-users-gear"></i>分配权限
                        </button>
                    @endcan
                </script>
            </div>
        </div>
    </div>
@endsection

@can('system.role')
    @section('script')
        <script>
            layui.use(['table', 'form'], function () {
                var table = layui.table;
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

                table.render({
                    elem: "#table-list"
                    , url: "{{route('backend.role.list')}}" //
                    , defaultToolbar: ['filter', 'exports', 'print', {
                        title: '帮助'
                        , layEvent: 'LAYTABLE_TIPS'
                        , icon: 'layui-icon-tips'
                    }]
                    , height: 'full-200' // 最大高度减去其他容器已占有的高度差
                    , page: true
                    , cols: [[
                        {type: 'checkbox', fixed: 'left'}
                        , {field: 'id', fixed: 'left', title: 'ID', width: 170, sort: true, totalRowText: '合计：'}
                        , {field: 'name', title: '名称', edit: 'text',}
                        , {field: 'guard_name', title: 'guard_name'}
                        , {fixed: 'right', title: '操作', width: 300, minWidth: 125, toolbar: '#barDemo'}
                    ]]
                });
                // 事件-工具条
                table.on('tool(table-list)', function (obj) {
                    var id = obj.config.id;
                    var checkStatus = table.checkStatus(id);
                    var data = obj.data;
                    var othis = lay(data);
                    console.log(data.id)
                    switch (obj.event) {
                        case 'edit':
                            layer.open({
                                type: 2
                                , title: '编辑'
                                , content: '{{route("backend.role.edit", "id")}}'.replace("id", data.id)
                                , maxmin: true
                                , area: ['400px', '200px']
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
                                    url: '{{route("backend.role.destroy")}}', // 获取颜色数据的接口
                                    type: 'POST',
                                    data: {ids: ids},
                                    dataType: 'json',
                                    success: function (res) {
                                        layer.close(index);
                                        if (res.code == 0) {
                                            table.reload('table-list');
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

                        case 'permission':
                            layer.open({
                                type: 2
                                , title: '分配权限'
                                , content: '{{route("backend.role.permission", "id")}}'.replace("id", data.id)
                                , maxmin: true
                                , area: ['550px', '800px']
                                , btnAlign: 'c'
                                , btn: ['关闭']
                                , yes: function (index, layero) {
                                    layer.close(index)
                                }
                            });
                            break;
                    }
                });

                var active = {
                    batchdel: function () {
                        var checkStatus = table.checkStatus('table-list')
                            , checkData = checkStatus.data; //得到选中的数据

                        if (checkData.length === 0) {
                            return layer.msg('请选择数据');
                        }

                        var ids = [];

                        checkData.forEach(function (item) {
                            ids.push(item.id)
                        })
                        console.log(ids)

                        // console.log(checkData)
                        layer.confirm('确定删除吗？', function (index) {
                            $.ajax({
                                url: '{{route("backend.role.destroy")}}', // 获取颜色数据的接口
                                type: 'POST',
                                data: {ids: ids},
                                dataType: 'json',
                                success: function (res) {
                                    layer.close(index);
                                    if (res.code == 0) {
                                        table.reload('table-list');
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
                            , content: '{{route('backend.role.create')}}'
                            , maxmin: true
                            , area: ['400px', '200px']
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
                table.on('edit(table-list)', function (obj) {
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
