@extends('layouts.admin')
@section('main')

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Thông tin Khóa học</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Thông tin Khóa học</li>
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
                                <tr>
                                    <td>{{$course->name}}</td>
                                    <td>{{$course->slug}}</td>
                                    <td>{{$course->price}}</td>
                                    <td>{{$course->category->name ?? null}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>