@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content ">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users Add</li>
            </ol>
        </nav>

        <div class="row form-control">
            <div class="body-card">
                <div class="card-body">

                    <h6 class="card-title">Add user</h6>

                    <form method="post" action="{{ url('admin/users/add') }}" class="forms-sample">
                    {{ csrf_field() }}

                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Username<span
                                    style="color: rgba(175, 22, 22, 0.726)">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="username"  placeholder="username">
                                   
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputUsername2" class="col-sm-3 col-form-label">
                                Name<span style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputUsername2" name="name"
                                    placeholder="name">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email<span
                                    style="color: red">*</span></label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="exampleInputEmail2" autocomplete="off"
                                    name="email" placeholder="Email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputMobile" name="phone" placeholder="Mobile number">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleSelectGender" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="role" required>
                                    <option value="">Select role</option>
                                    <option value="admin">admin</option>
                                    <option value="agent">agent</option>
                                    <option value="user">user</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="exampleSelectGender" class="col-sm-3 col-form-label">status</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="status" required>
                                    <option value="">Select status</option>
                                    <option value="active">active</option>
                                    <option value="inactive">inactive</option>                                  
                                </select>
                            </div>
                        </div>
                </div>

                <button type="submit" class="btn btn-primary me-2">Submit</button>
                <a href="{{ url('admin/users') }}" class="btn btn-secondary">Cancel</a>
                </form>

            </div>
        </div>
    </div>

    </div>
@endsection
