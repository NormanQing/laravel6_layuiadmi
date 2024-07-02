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
        <label for="" class="layui-form-label">菜单</label>
        <div class="layui-input-block">
            <input  lay-verify="required" type="radio" name="is_menu" value="1" title="是" @if(isset($data->is_menu) && $data->is_menu==1) checked @endif>
            <div lay-radio>
                <span style="color: blue;">是</span>
            </div>
            <input  lay-verify="required" type="radio" name="is_menu" value="2" title="否" @if(isset($data->is_menu) && $data->is_menu==2) checked @endif>
            <div lay-radio>
                <span style="color: pink;">否</span>
            </div>
        </div>

    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">图标类型</label>
        <div class="layui-input-block">
            <input  lay-verify="required" type="radio" name="icon_type" value="1" @if(isset($data->icon_type) && $data->icon_type==1) checked @endif  lay-filter="demo-radio-filter" />
            <div lay-radio>
                <span style="color: blue;">Layui</span>
            </div>
            <input  lay-verify="required" type="radio" name="icon_type" value="2" @if(isset($data->icon_type) && $data->icon_type==2) checked @endif  lay-filter="demo-radio-filter" />
            <div lay-radio>
                <span style="color: pink;">Font Awesome</span>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">图标</label>
        <div class="layui-input-block">
            <div class="layui-input-group">
                <div class="layui-input-split layui-input-prefix icon-show">
                    @if(isset($data->icon_type))
                        @if($data->icon_type == 2)
                            <i class="{{$data->icon_class}}"></i>
                        @else
                            <i class="layui-icon {{$data->icon_class}}"></i>
                        @endif
                    @endif
                </div>
                <input value="{{$data->icon_class ?? ''}}" class="layui-input" type="text" name="icon_class" lay-verify="required" placeholder="图标">
                <div class="layui-input-split layui-input-suffix">
                    <button type="button" class="layui-btn layui-bg-purple search-icon"><i class="layui-icon layui-icon-search" style="color:#fff"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">路由</label>
        <div class="layui-input-block">
            <input value="{{$data->route ?? ''}}" class="layui-input" type="text" name="route" placeholder="">
        </div>
    </div>
    <div class="layui-form-item">
        <label for="" class="layui-form-label">排序</label>
        <div class="layui-input-block">
            <input value="{{$data->sort ?? 0}}" class="layui-input" type="text" name="sort" lay-verify="required" placeholder="">
        </div>
    </div>

    <div class="layui-form-item">
        <div class="layui-form-item layui-hide">
            <input type="button" lay-submit="" lay-filter="layuiadmin-app-form-submit" id="layuiadmin-app-form-submit" value="确认添加">
            <input type="button" lay-submit="" lay-filter="layuiadmin-app-form-edit" id="layuiadmin-app-form-edit" value="确认编辑">
        </div>
    </div>
</div>
