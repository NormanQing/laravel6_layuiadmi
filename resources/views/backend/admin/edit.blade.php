@extends('backend.noadmincss')

@section('content')
    <div class="layui-form" lay-filter="layuiadmin-app-form-list" id="layuiadmin-app-form-list"
         style="padding: 20px 30px 0 0;">
        <div class="layui-form-item">
            <label class="layui-form-label">用户名</label>
            <div class="layui-input-block">
                <input value="{{$admin->username ?? ''}}" type="text" name="username" lay-verify="required"
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
        <div class="layui-form-item layui-hide">
            <input type="button" lay-submit="" lay-filter="layuiadmin-app-form-submit" id="layuiadmin-app-form-submit"
                   value="确认添加">
            <input type="button" lay-submit="" lay-filter="layuiadmin-app-form-edit" id="layuiadmin-app-form-edit"
                   value="确认编辑">
        </div>
    </div>
@endsection

@can('system.admin.edit')
    @section('script')
        <script>
            layui.use(['form', 'layer'], function () {
                var $ = layui.$
                    , layer = layui.layer
                    , form = layui.form;

                //事件-提交
                form.on('submit(layuiadmin-app-form-submit)', function (data) {
                    var field = data.field; //获取提交的字段
                    var index = parent.layer.getFrameIndex(window.name); //先得到当前iframe层的索引

                    var loading = layer.load(3, {
                        time: 30 * 1000
                    });
                    //提交 Ajax 成功后，关闭当前弹层并重载表格

                    $.ajax({
                        url: '{{route("backend.admin.update", $admin->id)}}', // 获取颜色数据的接口
                        type: 'POST',
                        data: field,
                        dataType: 'json',
                        success: function (res) {
                            layer.close(loading);
                            if (res.code == 0) {
                                parent.layui.table.reload('table-list'); //重载表格
                                parent.layer.close(index); //再执行关闭
                            }
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
            })

        </script>
    @endsection
@endcan
