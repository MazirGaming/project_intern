<h1 class="title">Hello</h1>
<h1 class="ceter-text">Danh sách khóa học đăng ký</h1>

@foreach ($listCourse as $course)
<h1 class="ceter-text">{{$course->name}}</h1>

<img src="{{asset('storage/attachments/'.$course->attachment->file_name)}}" class="card-img-top" alt="...">
<a href="{{route('course.show', ['course' => $course->id])}}" class="btn btn-sm bg-success-light me-2">
    Chi tiết khóa học
</a>
@endforeach

<h1 class="ceter-text">Tổng số tiền ${{$total}}</h1>

