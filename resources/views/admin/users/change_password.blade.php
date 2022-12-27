@extends('layouts.admin')
@section('main')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if(session()->has('error'))
    <div class="alert alert-danger">
        {{ session()->get('error') }}
    </div>
@endif


<div class="row">

<h1>Thay đổi mật khẩu</h1>
<form action="{{route('updatepassword')}}">
<div class="form-group row">
<input class="form-control @error('old-password') is-invalid @enderror" type="password" placeholder="password" name="old-password">
@error('old-password')
    <div class="invalid-feedback">{{$message}}</div>
@enderror
</div>
<div class="form-group row">
<input id="new_password" class="form-control @error('new_password') is-invalid @enderror" type="password" placeholder="new_password" name="new_password">
@error('new_password')
    <div class="invalid-feedback">{{$message}}</div>
@enderror
</div>
<div class="form-group row">
<input id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" type="password" placeholder="new_password_confirmation" name="new_password_confirmation">
@error('new_password_confirmation')
    <div class="invalid-feedback">{{$message}}</div>
@enderror
</div>
<div class="form-group row">
<button class="btn btn-primary btn-block" type="submit">Thay đổi mật khẩu</button>
</div>
</form>

<div class="text-center"><a href="{{route('home')}}">Quay lại trang chủ</a></div>
</div>
@endsection