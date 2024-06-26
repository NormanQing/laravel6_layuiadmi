

<option @if( $parentId ==  $permission['id']) selected @endif value="{{ $permission['id'] }}">
    @for ($i = 0; $i < $permission['lever']; $i++)━━@endfor┗━━{{ $permission['display_name'] }}
</option>
@if(isset($permission['children']))
    @foreach($permission['children'] as $child)
        <optgroup>
        @include('backend.permission._permission_children',['permission'=>$child])
        <optgroup/>
    @endforeach
@endif
