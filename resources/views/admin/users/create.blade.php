@extends('layouts.admin')
@section('main')

<div class="row ">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Thêm mới User</h4>
                            </div>
                            
                            <div class="card-body">
                                @include('admin.users._form')
                            </div>
                        </div>
                    </div>
                </div>
                @endsection