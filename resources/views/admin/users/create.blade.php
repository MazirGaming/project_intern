@extends('layouts.admin')
@section('main')

<div class="row ">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm mới User</h4>
                            </div>
                            
                            <div class="card-body">
                            <form action="{{route('user.store')}}" method="post">
                                @include('admin.users._form')
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endsection