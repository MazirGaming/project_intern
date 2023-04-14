@extends('layouts.admin')
@section('main')

<div class="row ">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Chỉnh sửa User</h4>
                <a href="{{route('user.index')}}">Danh sách User</a>
            </div>
            <div class="card-body">
                <form action="{{route('user.update', ['user' => $user->id])}}" method="post">
                    @method('put')
                    @include('admin.users._form')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection