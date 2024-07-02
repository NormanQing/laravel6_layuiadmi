@extends('backend.base')

@section('content')
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md4">
            <div class="layui-card">
                <div class="layui-card-header">个人资料</div>
                <div class="layui-card-body">
                    <h3 style="text-align: center;">{{$admin->username}}</h3>
                    <p style="text-align: center;margin-bottom: 25px;">{{$admin->email}}</p>

                    <form  class="layui-form" lay-filter="layuiadmin-app-form-list" id="layuiadmin-app-form-list"
                           style="padding: 20px 30px 0 0;">
                        <div class="layui-form-item">
                            <label class="layui-form-label">用户名</label>
                            <div class="layui-input-block">
                                <input disabled value="{{$admin->username ?? ''}}" type="text" name="username" lay-verify="required"
                                       placeholder="请输入用户名" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">昵称</label>
                            <div class="layui-input-block">
                                <input value="{{$admin->nickname ?? ''}}" type="text" name="nickname" lay-verify="required"
                                       placeholder="请输入昵称" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">手机号</label>
                            <div class="layui-input-block">
                                <input value="{{$admin->phone ?? ''}}" type="text" name="phone" lay-verify="required"
                                       placeholder="请输入号码" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">邮箱</label>
                            <div class="layui-input-block">
                                <input value="{{$admin->email ?? ''}}" type="text" name="email" lay-verify="required"
                                       placeholder="请输入邮箱" autocomplete="off" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">密码</label>
                            <div class="layui-input-block">
                                <input type="password" name="password" placeholder="输入则修改密码" autocomplete="off"
                                       class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">确认密码</label>
                            <div class="layui-input-block">
                                <input type="password" name="password_confirmation" placeholder="确认密码" autocomplete="off"
                                       class="layui-input">
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <input class="layui-btn layui-bg-purple layuiadmin-btn-list" type="sub" lay-submit="" lay-filter="layuiadmin-app-form-submit" id="layuiadmin-app-form-submit"
                                   value="提交">
                            <input class="layui-btn layui-btn-primary layui-border layuiadmin-btn-list" value="重置" id="resetButton">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="layui-col-md8">
            <div class="layui-tab layui-tab-brief">
                <ul class="layui-tab-title">
                    <li class="layui-this">操作记录</li>
                </ul>
                <div class="layui-tab-content">
                    <div class="layui-tab-item layui-show">
                        <div class="layui-card">
                            <div class="layui-form layui-card-header layuiadmin-card-header-auto">
                                <div class="layui-form-item">
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
                </div>
            </div>


        </div>
    </div>
@endsection

@can('system.admin')
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
                    , url: "{{route('backend.admin.log.list')}}?admin_id={{$admin->id}}" //
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

                //事件-提交
                form.on('submit(layuiadmin-app-form-submit)', function (data) {
                    var field = data.field; //获取提交的字段
                    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引

                    var loading = layer.load(3, {
                        time: 30 * 1000
                    });
                    //提交 Ajax 成功后，关闭当前弹层并重载表格

                    $.ajax({
                        url: '{{route("backend.admin.ddd", $admin->id)}}', // 获取颜色数据的接口
                        type: 'POST',
                        data: field,
                        dataType: 'json',
                        success: function (res) {
                            layer.close(loading);
                            if(res.code==0){
                                $('input[name="password"]').val('')
                                $('input[name="password_confirmation"]').val('')
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
                    return false;
                });

                $('#resetButton').on('click', function(){
                    document.getElementById("layuiadmin-app-form-list").reset();
                    form.render(); // 重新渲染表单
                })
            });
        </script>
    @endsection
@endcan
