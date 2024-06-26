<div class="layui-form" lay-filter="layuiadmin-app-form-list" id="layuiadmin-app-form-list" style="padding: 20px 30px 0 0;">
    <blockquote class="layui-elem-quote layui-quote-nm" style="color: red;">
        1.切记，非专业人员，切勿设置！！！！！！！！！！ <br />
        2.最顶级如果有子级 不需要设置路路由 <br />
        3.最顶级如果当成页面，那么就需要设置路由
    </blockquote>
    <div class="layui-form-item">
        <label class="layui-form-label">父级</label>
        <div class="layui-input-block">
            <select name="parent_id" lay-filter="aihao">
                <option value="0">顶级</option>
                @foreach($permissions as $item)
                    @include('backend.permission._permission_children', ['permission' => $item, 'parentId'=>$parentId ?? 0])
                @endforeach
            </select>
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">名称</label>
        <div class="layui-input-block">
            <input value="{{$data->display_name ?? ''}}" class="layui-input" type="text" name="display_name" lay-verify="required" placeholder="菜单名称">
        </div>
    </div>

    <div class="layui-form-item">
        <label for="" class="layui-form-label">权限</label>
        <div class="layui-input-block">
            <input value="{{$data->name ?? ''}}" class="layui-input" type="text" name="name" lay-verify="required" placeholder="权限">
        </div>

    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">路由name</label>
        <div class="layui-input-block">
            <input value="{{$data->route ?? ''}}" class="layui-input" type="text" name="route" lay-verify="required" placeholder="">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">排序</label>
        <div class="layui-input-block">
            <input value="{{$data->sort ?? ''}}" class="layui-input" type="text" name="sort" lay-verify="required" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-form-item layui-hide">
            <input type="button" lay-submit="" lay-filter="layuiadmin-app-form-submit" id="layuiadmin-app-form-submit" value="确认添加">
            <input type="button" lay-submit="" lay-filter="layuiadmin-app-form-edit" id="layuiadmin-app-form-edit" value="确认编辑">
        </div>
    </div>
</div>
