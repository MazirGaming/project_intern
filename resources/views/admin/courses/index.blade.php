@extends('layouts.admin')
@section('main')
@push('search')
    <x-form-search>
        <x-slot:option>
            <select name="category_id">
                <option value=''>Select a category</option>
                    @foreach ($categories as $category)
                    <option value='{{ $category->id }}' {{request()->get('category_id') == $category->id ? 'selected' :''}}>{{$category->name }}</option>
                    @endforeach
                </select>
        </x-slot>
    </x-form-search> 
@endpush
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
                    <div class="col-md-12 d-flex">

                        <div class="card card-table flex-fill">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-center mb-0">
                                        <thead>
                                            <tr>
                                                <th>
                                                    ID
                                                <x-sort-url :columnName="'id'"></x-sort-url>
                                                </th>
                                                <th>
                                                    Tên khóa học
                                                <x-sort-url :columnName="'name'"></x-sort-url>
                                                </th>
                                                <th>Tên danh mục</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng số học viên</th>
                                                <th>Tổng số bài học</th>
                                                <th>Tổng số chương</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($courses as $course)   
                                            <tr>
                                                <td>{{$course->id}}</td>
                                                <td> 
                                                    {{$course->name}}
                                                </td>
                                                <td>{{$course->category->name ?? null}}</td>
                                                <td>{{$course->is_online}}</td>
                                                <td>{{$course->view_count}}</td>
                                                <td>{{$course->lessons}}</td>
                                                <td>{{count($course->sections)}}</td>
                                                <td class="text-end">
                                                <div class="actions">
                                                </div>
                                            </td>   
</tr>                     
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $courses->appends(request()->all())->links() }}
                                    
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>
                </div>
@endsection



