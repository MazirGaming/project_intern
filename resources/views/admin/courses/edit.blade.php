@extends('layouts.admin')
@section('main')

<div class="row ">    
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Chỉnh sửa Course</h4>
                <a href="{{route('course.index')}}">Danh sách Course</a>
            </div>
            <div class="card-body">
            <form name="formCourse" id="formCourse" action="{{route('course.update', ['course' => $course->id])}}" method="post">
                @method('put')
                @include('admin.courses._form')
            </form>
        </div>
    </div>
</div>
@endsection