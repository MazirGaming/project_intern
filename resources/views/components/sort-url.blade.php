
    @if (request()->get('sort_type') == 'desc' && request()->get('column_name') == $columnName)
        <a href="{{$sortUrl}}">
            <i class="fa-solid fa-caret-down"></i>
        </a>
    @elseif(request()->get('sort_type') == 'asc' && request()->get('column_name') == $columnName)
        <a href="{{$sortUrl}}">
        <i class="fa-solid fa-caret-up"></i>
        </a>
    @else
        <a href="{{$sortUrl}}">
        <i class="fa-solid fa-sort"></i>
        </a>
       
    @endif
