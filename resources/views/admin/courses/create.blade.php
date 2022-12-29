@extends('layouts.admin')
@section('main')

<div class="row ">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Thêm mới Course</h4>
                <a href="{{route('course.index')}}">Danh sách Khóa học</a>
            </div>     
            <div class="card-body">
            <form action="{{route('course.store')}}" method="post">
                @include('admin.courses._form')
                <select name="category_id">
                <option value=''>Select a category</option>
                    @foreach ($categories as $category)
                    <option value='{{ $category->id }}' {{request()->get('category_id') == $category->id ? 'selected' :''}}>{{$category->name }}</option>
                    @endforeach
                </select>
            </form>
            </div>
        </div>
    </div>
    </div>
 @endsection