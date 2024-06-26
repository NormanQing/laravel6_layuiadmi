@extends('backend.noadmincss')

@section('content')
    @include('backend.role._form')
@endsection

@can('system.role.edit')
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
                        url: '{{route("backend.role.update", $role->id)}}', // 获取颜色数据的接口
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
