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
            <form name="formCourse" id="formCourse" action="{{route('course.store')}}" method="post" enctype="multipart/form-data">
                @include('admin.courses._form')
            </form>
            </div>
        </div>
    </div>
    </div>
 @endsection