<div class="top-nav-search">
    <form style="display: flex; align-items:center; flex-direction: row-reverse;">
        {{$slot}}
        <input type="text" class="form-control" placeholder="Search here" name="search" value="{{request()->get('search')}}" style="width:400px">
        <button class="btn" type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>