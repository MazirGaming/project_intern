<x-mail::message>
<h1 class="title">Hello</h1>
<h1 class="ceter-text">Danh sách khóa học đăng ký</h1>
@php 
    $total = 0 
@endphp
@foreach ($listCourse as $course)
@php 
    $total += $course->price * $course->quantity
@endphp
<h1 class="ceter-text">{{$course->name}}</h1>

<img src="{{asset('storage/attachments/'.$course->attachment->file_name)}}" class="card-img-top" alt="...">
<a href="{{route('course.show', ['course' => $course->id])}}" class="btn btn-sm bg-success-light me-2">
    Chi tiết khóa học
</a>
@endforeach

<h1 class="ceter-text">Tổng số tiền ${{$total}}</h1>
</x-mail::message>
