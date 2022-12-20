
@if(!empty(request()->get('search')))
    @if (request()->get('sort_type') == 'desc' && request()->get('column_name') == $name)
        <a href="?column_name={{ $name }}&sort_type=asc&search={{request()->get('search')}}">
            <i class="fa-solid fa-caret-down"></i>
        </a>
    @elseif(request()->get('sort_type') == 'asc' && request()->get('column_name') == $name)
        <a href="?column_name={{ $name }}&sort_type=desc&search={{request()->get('search')}}">
        <i class="fa-solid fa-caret-up"></i>
        </a>
    @else
        <a href="?column_name={{ $name }}&sort_type=desc&search={{request()->get('search')}}">
        <i class="fa-solid fa-sort"></i>
        </a>
    @endif
@else
    @if (request()->get('sort_type') == 'desc' && request()->get('column_name') == $name)
        <a href="?column_name={{ $name }}&sort_type=asc">
            <i class="fa-solid fa-caret-down"></i>
        </a>
    @elseif(request()->get('sort_type') == 'asc' && request()->get('column_name') == $name)
        <a href="?column_name={{ $name }}&sort_type=desc">
        <i class="fa-solid fa-caret-up"></i>
        </a>
    @else
        <a href="?column_name={{ $name }}&sort_type=desc">
        <i class="fa-solid fa-sort"></i>
        </a>
    @endif
@endif