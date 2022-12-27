
@extends('layouts.admin')
@section('main')

<div class="page-wrapper">
<div class="content container-fluid">
<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Thông tin User</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
<li class="breadcrumb-item active">Thông tin User</li>
</ul>
</div>
</div>
</div>
<div class="row settings-tab">
<div class="col-md-4">
<div class="card">

<div class="card-body p-0">

<table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>name</th>
                                                <th>slug</th>
                                                <th>price</th>
                                                <th>danh mục</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($courses as $course)   
                                            <tr>
                                                <td>{{$course->name}}</td>
                                                <td>{{$course->slug}}</td>
                                                <td>{{$course->price}}</td>
                                                <td>{{$course->category}}</td>
                                            </tr>                     
                                            @endforeach
                                            
                                        </tbody>
                                    </table>

</div>
</div>
</div>
<div class="col-md-8">
<div class="card">
<div class="card-header">
 <h4 class="card-title">Thông tin User</h4>
</div>
<div class="card-body">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" value="{{$user->name}}">
</div>
<div class="form-group">
<label>Email Address</label>
<input type="email" class="form-control" value="{{$user->email}}">
</div>
<div class="form-group">
<label>Phone</label>
<input type="text" class="form-control" value="{{$user->phone}}">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
