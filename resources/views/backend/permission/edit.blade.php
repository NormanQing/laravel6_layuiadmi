@extends('backend.noadmincss')

@section('content')
    @include('backend.permission._form')
@endsection
@can('system.permission.edit')
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
                        url: '{{route("backend.permission.update", $data->id)}}', // 获取颜色数据的接口
                        type: 'POST',
                        data: field,
                        dataType: 'json',
                        success: function (res) {
                            layer.close(loading);
                            if (res.code == 0) {
                                parent.layui.table.reload('table-list'); //重载表格
                                parent.layer.close(index); //再执行关闭
                            } else {
                                layer.msg(res.msg);
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

                $('.search-icon').on('click',function(){
                    layer.open({
                        type: 2
                        , content: '{{route('backend.permission.icon')}}'
                        , maxmin: true
                        , area: ['700px', '500px']
                        , btnAlign: 'c'
                        // , btn: ['确定', '取消']
                        // , yes: function (index, layero) {
                        //     //点击确认触发 iframe 内容中的按钮提交
                        //     var submit = layero.find('iframe').contents().find("#layuiadmin-app-form-submit");
                        //     submit.click();
                        // }
                    });
                });

                $('input[name="icon_class"]').on('change',function(){
                    var val = $(this).val();
                    var iconType = $('input[name="icon_type"]:checked').val();
                    if(!iconType){
                        layer.msg('请选择图标的类型-然后重新输入');
                        return false;
                    }
                    var iconStr = '';
                    if(iconType == 2){
                        iconStr = '<i class="'+ val +'"></i>';
                    }else{
                        iconStr = '<i class="layui-icon '+ val +'"></i>';
                    }
                    $(".icon-show").html(iconStr);
                });

                // radio 事件
                form.on('radio(demo-radio-filter)', function(data){
                    var elem = data.elem; // 获得 radio 原始 DOM 对象
                    var checked = elem.checked; // 获得 radio 选中状态
                    var value = elem.value; // 获得 radio 值
                    var othis = data.othis; // 获得 radio 元素被替换后的 jQuery 对象

                    var iconClass =  $('input[name="icon_class"]').val();
                    var iconStr = '';
                    if(value == 2){
                        iconStr = '<i class="'+ iconClass +'"></i>';
                    }else{
                        iconStr = '<i class="layui-icon '+ iconClass +'"></i>';
                    }
                    $(".icon-show").html(iconStr);
                });
            })

        </script>
    @endsection
@endcan
