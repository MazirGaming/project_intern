
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Tên khóa học</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$course->name ?? old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Slug</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ $course->slug ?? old('slug') }}">
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
                                            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price">
                                            @error('price')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Old-Price</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('old_price') is-invalid @enderror" name="old_price">
                                            @error('old_price')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Description</label>
                                        <div class="col-md-10">
                                            <textarea class="@error('description') is-invalid @enderror" name="description" id="" cols="60" rows="10"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Content</label>
                                        <div class="col-md-10">
                                            <textarea class="@error('content') is-invalid @enderror" name="content" id="" cols="60" rows="10"></textarea>
                                            @error('content')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Meta-Title</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" name="meta_title">
                                            @error('meta_title')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Meta-Desc</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('meta_desc') is-invalid @enderror" name="meta_desc">
                                            @error('meta_desc')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-md-2">Meta-Keyword</label>
                                        <div class="col-md-10">
                                            <input type="text" class="form-control @error('meta_keyword') is-invalid @enderror" name="meta_keyword">
                                            @error('meta_keyword')
                                                <div class="invalid-feedback">{{$message}}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>