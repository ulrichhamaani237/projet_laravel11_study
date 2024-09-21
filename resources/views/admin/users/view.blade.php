@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Users</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Users view
            </li>
        </ol>
    </nav>

    <div class="row">
        <div class="card-body">

            <h6 class="card-title">View User Form</h6>

            <form class="forms-sample">

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        @if (!empty($getRecord->photo))
                        <img style="border-radius: 100%; object-fit:cover;" width="50" height="50" src="{{ asset('upload/' . $getRecord->photo) }}" />
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        {{ $getRecord->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username</label>
                    <div class="col-sm-9">
                        {{ $getRecord->username }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                        {{ $getRecord->email }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        {{ $getRecord->address }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        @if ($getRecord->status == 'active')
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Inactive</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">website</label>
                    <div class="col-sm-9">
                        {{ $getRecord->website }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Role</label>
                    <div class="col-sm-9">
                        @if ($getRecord->role == 'admin')
                        <span class="badge bg-info">Admin</span>
                        @elseif($getRecord->role == 'agent')
                        <span class="badge bg-primary">Agent</span>
                        @else
                        <span class="badge bg-success">User</span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                    <div class="col-sm-9">
                        {{ $getRecord->phone }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Created</label>
                    <div class="col-sm-9">
                        <span class="badge bg-dark">{{ date('d-m-y', strtotime($getRecord->created_at)) }}</span>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Updated</label>
                    <div class="col-sm-9">
                        <span class="badge bg-dark">{{ date('d-m-y h:s', strtotime($getRecord->updated_at)) }}</span>
                    </div>
                </div>

                <a href="{{ url('admin/users') }}" class="btn btn-secondary">back</a>

            </form>

        </div>
    </div>
</div>
@endsection
