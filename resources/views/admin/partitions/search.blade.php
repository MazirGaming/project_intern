<div class="top-nav-search">
                <form>
                    <input type="text" class="form-control" placeholder="Search here" name="search" value="{{request()->get('search')}}">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                    <select style="position: absolute;right: 0; bottom: 7px;" class="select" name="role">
                        <option></option>
                        <option value="1">Admin</option>
                        <option value="3">Student</option>
                    </select>
                </form>
</div>