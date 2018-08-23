
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
    <!--Add New-->
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
    <!--End Add New-->

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
                            <th>Action</th>
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
                                <td align="center">
                                    <div>
                                        <a href="{{ url('admin/categories/view') }}" class="btn-sm btn-success" data-toggle="modal" data-target="#view_{{ $value->id }}" data-whatever="@mdo">View</a>
                                        <a href="{{ url('admin/categories/edit') }}" class="btn-sm btn-info" data-toggle="modal" data-target="#edit_{{ $value->id }}" data-whatever="@mdo">Edit</a>
                                        <a href="{{ url('admin/categories/delete') }}/{{ $value->id }}" class="btn-sm btn-danger" onclick="confirm('Click Button Confirm to Delete')">Delete</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                        <!--Edit -->
                        <div class="modal fade" id="edit_{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Coupon Categories</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ url('admin/categories/edit') }}/{{ $value->id }}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" name="name" id="name" value="{{ $value->name  }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="text" class="form-control" name="slug" id="slug" value="{{ $value->slug }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="des">Description</label>
                                                <textarea name="description" id="des" cols="20" rows="5" class="form-control">{{ $value->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!--End Edit-->
                        <!--View-->
                        <div class="modal fade" id="view_{{ $value->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">View Coupon Categories</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                         asdasd
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End View-->
                    @endforeach
                </table>
            </div>
            <div class="small text-muted">
                <div class="float-left">{{ $categories->count() }}</div>
                <div class="float-right">{{ $categories->render() }}</div>
            </div>
        </div>
    </div>

@endsection

