@extends('layouts.admin')
@section('main')
@push('search')
    @include('admin.partitions.search')
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
<a href="{{route('user.create')}}">Thêm mới User</a>
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
                                                    Name
                                                <x-sort-url :columnName="'name'"></x-sort-url>
                                                </th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th class="text-end">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)   
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->role_name}}</td>
                                                <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{route('user.edit', ['user' => $user->id])}}" class="btn btn-sm bg-success-light me-2">
                                                        <i class="fe fe-pencil"></i>
                                                    </a>
                                                    <x-delete userId="{{$user->id}}" currentUserId="{{Auth::user()->id}}" route="{{route('user.destroy', ['user' => $user->id])}}" :label="'Xóa'"></x-delete>
                                                </div>
                                            </td>   
</tr>                     
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->appends(request()->all())->links() }}
                                    
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>
                </div>
@endsection

@push('scripts')
    <script src="{{asset('assets/js/user.js')}}"></script>
@endpush


