@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

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
                            <img src="{{asset('storage/attachments/'.$course->attachment->file_name)}} ?? ''" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$course->name}}</h5>
                                <p class="card-text">{{$course->content}}</p>
                            </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
