{{--<div style="margin-left: {{$permission['lever'] *8}}px;margin-bottom: 4px;">--}}
{{--    <input id="menu{{$parentId}}" type="checkbox" name="permissions[]" value="{{$permission['id']}}"--}}
{{--           title="{{$permission['display_name']}}" lay-skin="primary" {{$permission['checked'] ?? ''}} />--}}

{{--    @if(isset($permission['children']))--}}
{{--        @foreach($permission['children'] as $child)--}}
{{--            @include('backend.admin._permission_children',['permission'=>$child, 'parentId'=> $parentId.'-'.$child['id']])--}}
{{--        @endforeach--}}
{{--    @endif--}}
{{--</div>--}}


<li style="margin-bottom: 5px">
    <input id="menu{{$parentId}}" type="checkbox" name="permissions[]" value="{{$permission['id']}}" title="{{$permission['display_name']}}" lay-skin="primary" {{$permission['checked'] ?? ''}} />

    @if(isset($permission['children']))
        <ul class="lever-{{$permission['lever']}}" style="margin-left: {{$permission['lever'] *8}}px;margin-top:10px;">
            @foreach($permission['children'] as $child)
                @include('backend.admin._permission_children',['permission'=>$child, 'parentId'=> $parentId.'-'.$child['id']])
            @endforeach
        </ul>
    @endif
</li>
{{--<div style="margin-left: {{$permission['lever'] *8}}px;margin-bottom: 4px;">--}}

{{--</div>>--}}
