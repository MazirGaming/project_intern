
  @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Tên khóa học</label>
                                        <div class="col-md-10">
                                            <input id="title" onkeyup="ChangeToSlug();" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$course->name ?? old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Slug</label>
                                        <div class="col-md-10">
                                            <input id="slug" type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $course->slug ?? old('slug') }}">
                                            @error('slug')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Link</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{$course->link ?? old('link') }}">
                                            @error('link')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Price</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{$course->price ?? old('price') }}">
                                            @error('price')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Old-Price</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('old_price') is-invalid @enderror" name="old_price" value="{{$course->old_price ?? old('old_price') }}">
                                            @error('old_price')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    <label class="col-form-label col-md-2">Chọn danh mục</label>
                                    <div class="col-md-10">

                                    <select name="category_id">
                                        <option value=''>Select a category</option>
                                            @foreach ($categories as $category)
                                            <option value='{{ $category->id }}' {{request()->get('category_id') == $category->id ? 'selected' :''}}>{{$category->name }}</option>
                                            @endforeach
                                    </select>
                                    </div>

                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="@error('description') is-invalid @enderror" name="description" id="" cols="60" rows="10">{{old('description')}}</textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Content</label>
                                        <div class="col-md-10">
                                            <textarea class="@error('content') is-invalid @enderror" name="content" id="" cols="60" rows="10">{{old('content')}}</textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Meta-Title</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title" value="{{$course->meta_title ?? old('meta_title') }}">
                                            @error('meta_title')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Meta-Desc</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc" value="{{$course->meta_desc ?? old('meta_desc') }}">
                                            @error('meta_desc')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Meta-Keyword</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword" value="{{$course->meta_keyword ?? old('meta_keyword') }}">
                                            @error('meta_keyword')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Benefits</label>
                                        <div class="col-md-10">

                                        <input id="benefits" type="text" class="form-control @error('benefits') is-invalid @enderror" name="benefits" value="">

                                            @error('benefits')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div id="myDIV" class="header1">
                                            <h2 style="margin:5px">My To Do List</h2>
                                            <input type="text" id="myInput" placeholder="Title...">
                                            <span onclick="newElement()" class="addBtn">Add</span>
                                            </div>

                                            <ul id="myUL">
                                            <li>Hit the gym</li>
                                            <li class="checked">Pay bills</li>
                                            <li>Meet George</li>
                                            <li>Buy eggs</li>
                                            <li>Read a book</li>
                                            <li>Organize office</li>
                                            </ul>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary" name="submit" onclick="DoSubmit()">Submit</button>
                                    </div>
@push('scripts')
    <script src="{{asset('assets/js/slug.js')}}"></script>
@endpush
<script>
    // Create a "close" button and append it to each list item
var myNodelist = document.getElementsByTagName("LI");
var i;
for (i = 0; i < myNodelist.length; i++) {
  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  myNodelist[i].appendChild(span);
}

// Click on a close button to hide the current list item
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
  close[i].onclick = function() {
    var div = this.parentElement;
    div.style.display = "none";
  }
}

// Add a "checked" symbol when clicking on a list item
var list = document.querySelector('ul');
list.addEventListener('click', function(ev) {
  if (ev.target.tagName === 'LI') {
    ev.target.classList.toggle('checked');
  }
}, false);



var arr = [];

// Create a new list item when clicking on the "Add" button
function newElement() {
  var li = document.createElement("li");
  var inputValue = document.getElementById("myInput").value;
  var t = document.createTextNode(inputValue);
  var input = document.getElementById("benefits").value;
  li.appendChild(t);
  arr.push(inputValue);  

  if (inputValue === '') {
    alert("You must write something!");
  } else {
    document.getElementById("myUL").appendChild(li);
  }
  document.getElementById("myInput").value = "";

  var span = document.createElement("SPAN");
  var txt = document.createTextNode("\u00D7");
  span.className = "close";
  span.appendChild(txt);
  li.appendChild(span);

  for (i = 0; i < close.length; i++) {
    close[i].onclick = function() {
      var div = this.parentElement;
      div.style.display = "none";
    }
  }
}

function DoSubmit(){
  document.myform.benefits.value = arr;
  document.getElementById("myform").submit();
}

</script>