<div class="top-nav-search">
    <form>
        {{$slot}}
        <input type="text" class="form-control" placeholder="Search here" name="search" value="{{request()->get('search')}}">
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>