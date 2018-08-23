
@extends('admin.master')

@section('path')
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Coupons</a>
                </li>
                <li class="breadcrumb-item active">Stores</li>
            </ol>
        </div>
    </div>
@endsection


@section('content')
    <!--Add New-->
    <div class="modal fade" id="addStores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Coupon Stores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/store') }}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('admin.coupon.store.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Add New-->
    <!--View-->
    {{--<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">--}}
        {{--<div class="modal-dialog" role="document">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<h5 class="modal-title" id="exampleModalLabel">View Coupon Stores</h5>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!--End View-->

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Stores Table
            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal" data-target="#addStores" data-whatever="@mdo">AddNew</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Slug</th>
                        <th>Create By</th>
                        <th>Created At</th>
                        <th>ID User</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    @foreach($stores as $value)
                        <tbody>
                        <tr>
                            <td><img src="{{ asset('image') }}/{{ $value->image }}" alt="" width="150px" style=" display: block; margin-left: auto; margin-right: auto;"></td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->description }}</td>
                            <td>{{ $value->slug }}</td>
                            <td>{{ $value->user->name }}</td>
                            <td>{{ $value->created_at }}</td>
                            <td>{{ $value->user_id }}</td>
                            <td align="center">
                                <div>
                                    <a href="{{ url('admin/categories/view') }}/{{ $value->id }}" class="btn-sm btn-success" data-toggle="modal" data-target="#view" data-whatever="@mdo">View</a>
                                    {{--<a href="{{ url('admin/categories') }}/{{ $value->id }}" class="btn-sm btn-info">Edit</a>--}}
                                    <a href="{{ url('admin/categories/delete') }}/{{ $value->id }}" class="btn-sm btn-danger">Delete</a>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="small text-muted">
                {{--<div class="float-left">{{ $categories->count() }}</div>--}}
                <div class="float-right">{{ $stores->render() }}</div>
            </div>
        </div>
    </div>
@endsection

