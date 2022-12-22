<div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here" name="search" value="{{request()->get('search')}}">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    <select style="position: absolute;right: 0; bottom: 7px;" class="select" name="role">
                    @if (request()->get('role')==1)
                    <option value="1">Admin</option>
                    <<option></option>
                    <option value="3">Student</option>
                    @elseif(request()->get('role')==3)
                    <option value="3">Student</option>
                    <<option></option>
                    <option value="1">Admin</option>
                    @else
                        <<option></option>
                        <option value="1">Admin</option>
                        <option value="3">Student</option>
                    @endif
                    </select>
                </form>
</div>