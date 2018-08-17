
@extends('admin.master')

@section('path')
    <div class="row">
        <div class="col-md-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Coupons</a>
                </li>
                <li class="breadcrumb-item active">Categories</li>
            </ol>
        </div>
    </div>
    @endsection


@section('content')

    <div class="modal fade" id="addCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Coupon Categories</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/categories') }}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                        @include('admin.coupon.categories.form')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Categories Table
            <button type="button" class="btn-sm btn-primary float-right" data-toggle="modal" data-target="#addCategories" data-whatever="@mdo">AddNew</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Slug</th>
                            <th>Create By</th>
                            <th>Created At</th>
                            <th>ID User</th>
                        </tr>
                    </thead>
                    @foreach($categories as $value)
                        <tbody>
                            <tr>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->description }}</td>
                                <td>{{ $value->slug }}</td>
                                <td>{{ $value->user->name }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->user_id }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="card-footer small text-muted">
                {{ $categories->render() }}
            </div>
        </div>
    </div>
@endsection

