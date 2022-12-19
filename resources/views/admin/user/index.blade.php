@extends('layouts.admin')
@section('main')
@push('search')
    @include('admin.partitions.search')
@endpush
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
                                                <x-sort-column :name="'id'" :type="'desc'"></x-sort-column>
                                                </th>
                                                <th>
                                                    Name
                                                <x-sort-column :name="'name'" :type="'desc'"></x-sort-column>
                                                </th>
                                                <th>Phone</th>
                                                <th>Email</th>
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
                                                <td class="text-end">
                                                <div class="actions">
                                                    <a href="{{route('user.edit', ['user' => $user->id])}}" class="btn btn-sm bg-success-light me-2">
                                                        <i class="fe fe-pencil"></i>
                                                    </a>
                                                    <a href="{{route('user.destroy', ['user' => $user->id])}}" class="btn btn-sm bg-danger-light">
                                                        <i class="fe fe-trash"></i>
                                                    </a>
                                                </div>
                                            </td>   
</tr>                     
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $users->appends(['search' => request()->search])->links() }}
                                    
                                </div>
                                
                            </div>
                            
                        </div>

                    </div>
                </div>
@endsection

