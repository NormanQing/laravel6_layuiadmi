@extends('backend.base')

@section('content')
    <div class="layui-row layui-col-space15">
        <div class="layui-card">
            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                <div class="layui-form-item">
                    <div class="layui-inline">
                        <label class="layui-form-label">用户名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="username" placeholder="请输入" autocomplete="off"
                                   class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">IP</label>
                        <div class="layui-input-inline">
                            <input type="text" name="ip" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">请求方式</label>
                        <div class="layui-input-inline">
                            <input type="text" name="method" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">路由别名</label>
                        <div class="layui-input-inline">
                            <input type="text" name="route" placeholder="请输入" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-inline">
                            <select name="label">
                                <option value="">请选择标签</option>
                                <option value="1">开启</option>
                                <option value="2">禁用</option>
                            </select>
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
                <table id="table-list" lay-filter="table-list"></table>
            </div>
        </div>
    </div>
@endsection

@can('system.admin.operation')
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
                    , url: "{{route('backend.admin.log.list')}}" //
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
                        , {field: 'admin_name', title: '用户',width: 120,}
                        , {field: 'ip', title: 'ip',width: 120,}
                        , {field: 'method', title: '请求方式',width: 120,}
                        , {
                            field: 'route',
                            title: '路由别名',
                            width: 290,
                        }
                        , {
                            field: 'request_path',
                            title: '请求地址',
                        }
                        , {
                            field: 'data',
                            title: '请求参数',
                            edit: 'text'
                        }
                    ]]
                });
            });
        </script>
    @endsection
@endcan
