

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
        <textarea class="@error('description') is-invalid @enderror" name="description" id="" cols="60" rows="10">{{old('description') ? old('description') : $course->description ?? ''}}</textarea>
        @error('description')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-form-label col-md-2">Content</label>
    <div class="col-md-10">
        <textarea class="@error('content') is-invalid @enderror" name="content" id="" cols="60" rows="10">{{old('content') ? old('content') : $course->content ?? ''}}</textarea>
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
    <label class="col-form-label col-md-2">Add-Benefits</label>
    <div class="col-md-10">
        <div class="input-group">
            <input class="form-control" type="text" id="valueInput" name="add-benefits" placeholder="Input text here...">
            <div class="input-group-append">
                <span class="btn btn-primary" onclick="addToDoList()">Add</span>
            </div>
        </div>
        <div class="col-md-8" id="table">
            
        </div>
    </div>
</div>

<div class="form-group row">
    <label class="col-form-label col-md-2">Benefits</label>
    <div class="col-md-10">
        <input type="text" id="benefits" class="form-control @error('benefits') is-invalid @enderror" name="benefits" value="{{$course->benefits ?? old('benefits')}}">
        @error('benefits')
            <div class="invalid-feedback">{{$message}}</div>
        @enderror
    </div>
</div>

<div class="text-end">
    <button type="submit" class="btn btn-primary" name="submit" >Submit</button>
</div>
@push('scripts')
    <script src="{{asset('assets/js/slug.js')}}"></script>
    <script src="{{asset('assets/js/benefit.js')}}"></script>
@endpush
