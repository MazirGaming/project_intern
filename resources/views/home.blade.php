@extends('layouts.app')

@section('content')
@if(session()->has('message'))
<div class="alert alert-success">
    {{ session()->get('message') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="row row-cols-1 row-cols-md-4 g-4">
                        @foreach($courses as $course)
                        <div class="col">
                            <div class="card">
                                <img style="height: 185px; border: 1px solid #ccc; boder-radius: 3px;"
                                    src="{{asset('storage/attachments/'.$course->attachment->file_name)}}"
                                    class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$course->name}}</h5>
                                    <p class="card-text">{{$course->content}}</p>
                                </div>
                                <button><a style="text-decoration:none; color: black"
                                        href="{{route('add.to.cart', ['id' => $course->id])}}">Thêm giỏ
                                        hàng</a></button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $courses->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection